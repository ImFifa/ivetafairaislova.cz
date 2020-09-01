<?php

declare(strict_types=1);

namespace App\ProjectModule\Presenters;

use App\Model\NewModel;
use App\Model\ImageModel;
use App\Model\GalleryModel;

final class HomepagePresenter extends BasePresenter
{
    /** @var NewModel @inject */
    public $news;

    /** @var ImageModel @inject */
    public $images;

    /** @var GalleryModel @inject */
    public $gallery;

    public function renderDefault(): void
    {
        $this->template->news = $this->news->getPublicNews($this->lang)->limit(1);
        $this->template->events = $this->repository->getEvents();
        $this->template->year = max($this->repository->getYearsOfResults());
    }

    public function renderGallery($year): void
    {

        $this->template->galleries = $this->repository->getAllGalleries();
        $this->template->gallery = $this->repository->getGallery($year);
        $this->template->images = $this->images->getImagesByGallery($this->template->gallery->id);

    }

    public function renderResults($year): void
    {
        $this->template->results = $this->repository->getResultsByYear($year);
        $this->template->year = $year;
        $this->template->years = $this->repository->getYearsOfResults();
    }

}
