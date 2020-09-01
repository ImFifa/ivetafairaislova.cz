<?php

namespace App\AdminModule\Presenters;

use App\Grid\EventGrid;
use App\Grid\IEventGridFactory;
use Nette\Utils\DateTime;
use Nette\Application\UI\Form;
use App\Service\Helpers;
use Nette\Database\Table\ActiveRow;
use Nette\Http\FileUpload;
use Nette\Utils\Strings;

class EventPresenter extends BaseUWPresenter
{

    /** @var IEventGridFactory @inject */
	public $eventGridFactory;


    public function renderEdit(?int $id): void
	{
		$event = $this->repository->event->get($id);


        /** @var Form $form */
        $form = $this['eventForm'];
        $form->setDefaults($event);

		$this->template->event = $event;
	}

	protected function createComponentEventGrid(): EventGrid
	{
		return $this->eventGridFactory->create();
	}

	protected function createComponentEventForm(): Form
	{
		$form = new Form();

        $form->addHidden('id');

        $form->addText('name', 'Název')
            ->addRule(Form::MAX_LENGTH, 'Maximálné délka je %s znaků', 150)
            ->setRequired('Musíte uvést jméno události');

        $form->addText('date', 'Datum')
            ->setDefaultValue((new DateTime())->format('j.n.Y'))
            ->setRequired('Musíte uvést plánovaný počátek a konec události.');

        $form->addText('link', 'Odkaz')
            ->addRule(Form::MAX_LENGTH, 'Maximálné délka je %s znaků', 200);

        $form->addSubmit('save', 'Uložit');

        $form->onSubmit[] = function (Form $form) {
            $values = $form->getValues(true);
            $values['date'] = date_create_from_format('j.n.Y', $values['date'])->setTime(0, 0, 0);

            if ($values['id'] === '') {
                unset($values['id']);
                $values['id'] = $this->repository->event->insert($values)->id;
                $this->flashMessage('Událost přidána', 'success');
            } else {
                $this->repository->event->get($values['id'])->update($values);
                $this->flashMessage('Událost upravena', 'success');
            }

            $this->redirect('this', ['id' => $values['id']]);
        };

		return $form;
	}
}
