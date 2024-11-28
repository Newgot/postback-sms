<?php

namespace App\Services\Params;

readonly class GetNumberServiceParams
{
    public function __construct(
        public string $country,
        public string $service,
        public int    $rentTime,
    )
    {
    }

    public function toArray(): array
    {
        return [
            'country' => $this->country,
            'service' => $this->service,
            'rentTime' => $this->rentTime,
        ];
    }
}
