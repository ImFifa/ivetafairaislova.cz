<?php

namespace App\Service;

use Nette\Database\Table\ActiveRow;
use Nette\Database\Table\Selection;

/**
 * @property-read \App\Model\ResultModel $result
 * @property-read \App\Model\EventModel $event
 * @property-read \App\Model\NewModel $new
 * @property-read \App\Model\GalleryModel $gallery
 * @property-read \App\Model\ImageModel $image
 */
class ProjectModelRepository extends ModelRepository
{

    public function findPublicNews(int $limit, int $offset): Selection
    {
        return $this->new->getTable()->where('public', 1)->order('id DESC')->limit($limit, $offset);
    }

    public function getPublicNewsCount(): int
    {
        return $this->new->getTable()->where('public', 1)->count();
    }

    // gallery
    public function getGallery(string $name): ActiveRow
    {
        return $this->gallery->getTable()->where('name', $name)->fetch();
    }
    public function getAllGalleries(): array
    {
        return $this->gallery->getTable()->order('name DESC')->fetchAll();
    }

    // results
    public function getResultsByYear($year): array
    {
        return $this->result->getTable()->where('YEAR(date)', $year)->fetchAll();
    }
    public function getAllYearsOfResults(): array
    {
        return $this->result->getTable()->fetchAll();
    }

    // events
    public function getEvents(): array
    {
        return $this->event->getTable()->order('date DESC')->limit(3)->fetchAll();
    }
}
