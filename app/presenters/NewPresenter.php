<?php

declare(strict_types=1);

namespace App\ProjectModule\Presenters;

final class NewPresenter extends BasePresenter
{
    public function renderDefault(): void
    {

    }

    public function renderShow($slug): void
    {
        $this->template->new = $this->repository->new->getNew($slug);

        if ($this->template->new->gallery_id != NULL)
            $this->template->images = $this->repository->image->getImagesByGallery($this->template->new->gallery_id);
    }

}
