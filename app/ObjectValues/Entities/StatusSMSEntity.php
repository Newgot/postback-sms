<?php

namespace App\ObjectValues\Entities;

use Illuminate\Support\Carbon;

readonly class StatusSMSEntity
{
    public function __construct(
        public string $status,
        public int $countSMS,
        public Carbon $endRentDate
    )
    {
    }
}
