<?php

namespace App\Model;

use Nette\Database\Table\ActiveRow;
use Nette\Database\Table\Selection;

class EventModel extends BaseModel
{

    protected $table = 'events';

    public function getEvent($slug): ?ActiveRow
    {
        return $this->getTable()->where('slug', $slug)->fetch();
    }
}
