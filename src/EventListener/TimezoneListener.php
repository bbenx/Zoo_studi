<?php

namespace App\EventListener;

use Symfony\Component\HttpKernel\Event\RequestEvent;

class TimezoneListener
{
    private string $timezone;

    public function __construct(string $timezone)
    {
        $this->timezone = $timezone;
    }

    public function onKernelRequest(RequestEvent $event): void
    {
        date_default_timezone_set($this->timezone);
    }
}
