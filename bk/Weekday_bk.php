<?php

declare(strict_types=1);

namespace MyVendor\Weekday\Resource\App;

use BEAR\Resource\ResourceObject;
use DateTimeImmutable;
use MyVendor\Weekday\Exception\InvalidDateTime;

class Weekday_bk extends ResourceObject
{
    public function onGet(int $year, int $month, int $day): static
    {
        $dateTime = DateTimeImmutable::createFromFormat('Y-m-d', "$year-$month-$day");
        if (! $dateTime instanceof DateTimeImmutable) {
            throw new InvalidDateTime("$year-$month-$day");
        }
        $weekday = $dateTime->format('D');
        $this->body = ['weekday' => $weekday];

        return $this;
    }
}