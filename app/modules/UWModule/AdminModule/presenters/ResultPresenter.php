<?php

namespace App\AdminModule\Presenters;

use App\Grid\ResultGrid;
use App\Grid\IResultGridFactory;
use Nette\Database\Table\ActiveRow;
use Nette\Utils\DateTime;
use Nette\Application\UI\Form;

class ResultPresenter extends BaseUWPresenter
{

    /** @var IResultGridFactory @inject */
    public $resultGridFactory;

    public function renderEdit(?int $id): void
    {
        $result = $this->repository->result->get($id);

        /** @var Form $form */
        $form = $this['resultForm'];
        $form->setDefaults($result);

        $this->template->result = $result;
    }

    protected function createComponentResultGrid(): ResultGrid
    {
        return $this->resultGridFactory->create();
    }

    protected function createComponentResultForm(): Form
    {
        $form = new Form();

        $form->addHidden('id');

        $form->addText('name', 'Název závodu')
            ->addRule(Form::MAX_LENGTH, 'Maximálné délka je %s znaků', 150)
            ->setRequired('Musíte uvést jméno závodu');

        $form->addText('date', 'Datum konání')
            ->setHtmlType('date')
            ->setDefaultValue((new DateTime())->format('d.m.Y'))
            ->setRequired('Musíte uvést datum konání');


        $form->addHidden('year');

        $form->addText('rank', 'Umístění')
            ->setHtmlType('number')
            ->setRequired('Musíte uvést dosažené umístění');

        $form->addText('link', 'Odkaz na výsledky')
            ->addRule(Form::MAX_LENGTH, 'Maximálné délka je %s znaků', 200);

        $form->addSubmit('save', 'Uložit');

        $form->onSubmit[] = function (Form $form) {
            $values = $form->getValues(true);
            $values['year'] = date("Y", strtotime($values['date']));

            if ($values['id'] === '') {
                unset($values['id']);
                $values['id'] = $this->repository->result->insert($values)->id;
                $this->flashMessage('Událost přidána', 'success');
            } else {
                $this->repository->result->get($values['id'])->update($values);
                $this->flashMessage('Událost upravena', 'success');
            }

            $this->redirect('this', ['id' => $values['id']]);
        };

        return $form;
    }
}
