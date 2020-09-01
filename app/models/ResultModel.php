<?php

namespace App\Model;

use Nette\Database\Table\ActiveRow;
use Nette\Database\Table\Selection;

class ResultModel extends BaseModel
{

    protected $table = 'results';

    public function getResult($slug): ?ActiveRow
    {
        return $this->getTable()->where('public', 1)->where('slug', $slug)->fetch();
    }

    public function getResults(): Selection
    {
        return $this->getTable()->order('id DESC');
    }
}
