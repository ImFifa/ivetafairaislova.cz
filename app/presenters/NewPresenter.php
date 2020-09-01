<?php

declare(strict_types=1);

namespace App\ProjectModule\Presenters;

use App\Model\ImageModel;
use App\Model\NewModel;

final class NewPresenter extends BasePresenter
{

    /** @var ImageModel @inject */
    public $images;

    /** @var NewModel @inject */
    public $news;

    public function renderDefault(): void
    {
        $this->template->news = $this->news->getPublicNews('cs');
    }

    public function renderShow($slug): void
    {
        $this->template->new = $this->repository->new->getNew($slug, 'cs');

        if ($this->template->new->gallery_id != NULL)
            $this->template->images = $this->repository->image->getImagesByGallery($this->template->new->gallery_id);
    }

}
