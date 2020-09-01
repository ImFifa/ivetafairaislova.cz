<?php

namespace App\Grid;

use Nette;
use Nette\Database\Table\ActiveRow;
use Nette\Forms\Container;

class ResultGrid extends BaseGrid
{

    protected function build(): void
    {
        $this->model = $this->repository->result;

        parent::build();

        $this->addColumn('date', 'Datum konání');
        $this->addColumn('name', 'Název závodu');
        $this->addColumn('rank', 'Umístění');
        $this->addColumn('link', 'Odkaz');

        $this->addRowAction('edit', 'Upravit', static function () {});
        $this->addRowAction('delete', 'Smazat', static function (ActiveRow $record) {
            $record->delete();
        })
            ->setProtected(false)
            ->setConfirmation('Opravdu chcete smazat událost?');
    }
}
