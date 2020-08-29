<?php

declare(strict_types=1);

namespace App\ProjectModule\Presenters;

final class EventPresenter extends BasePresenter
{
    public function renderDefault(): void
    {

    }

    public function renderShow($slug): void
    {
        $this->template->event = $this->repository->event->getEvent($slug);
    }

}
