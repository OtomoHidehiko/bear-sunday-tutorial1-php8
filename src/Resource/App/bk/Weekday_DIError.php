<?php

declare(strict_types=1);

namespace MyVendor\Weekday\Resource\App;

use BEAR\Resource\ResourceObject;
use MyVendor\Weekday\MyLoggerInterface;

class Weekday_DIError extends ResourceObject
{
     public function __construct(public MyLoggerInterface $logger)
     {
     }

    public function onGet(int $year, int $month, int $day) : ResourceObject
    {
        $weekday = \DateTime::createFromFormat('Y-m-d', "$year-$month-$day")->format('D');
        $this->body = [
            'weekday' => $weekday
        ];
            $this->logger->log("$year-$month-$day {$weekday}");

        return $this;
    }
}