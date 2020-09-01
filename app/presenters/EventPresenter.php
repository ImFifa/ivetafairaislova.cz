<?php

declare(strict_types=1);

namespace App\ProjectModule\Presenters;

final class EventPresenter extends BasePresenter
{
    public function renderDefault(): void
    {
        $this->template->futureEvents = $this->repository->getEvents();
        $this->template->passedEvents = $this->repository->getEvents();
    }

}
