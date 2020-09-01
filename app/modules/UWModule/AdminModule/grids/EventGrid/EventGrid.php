<?php

namespace App\Grid;

use Nette;
use Nette\Database\Table\ActiveRow;
use Nette\Forms\Container;

class EventGrid extends BaseGrid
{

    protected function build(): void
    {
        $this->model = $this->repository->event;

        parent::build();

        $this->addColumn('name', 'Název');
        $this->addColumn('date_from', 'Datum zahájení');
        $this->addColumn('date_to', 'Datum ukončení');
        $this->addColumn('link', 'Odkaz');

        $this->addRowAction('edit', 'Upravit', static function () {});
        $this->addRowAction('delete', 'Smazat', static function (ActiveRow $record) {
            $record->delete();
        })
            ->setProtected(false)
            ->setConfirmation('Opravdu chcete smazat událost?');
    }

}
