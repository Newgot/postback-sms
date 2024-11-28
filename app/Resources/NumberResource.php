<?php

namespace App\Resources;

use App\Models\Number;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property Number $resource
 */
class NumberResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'number' => $this->resource->number,
            'activation' => $this->resource->activation,
            'end_date' => $this->resource->end_date,
        ];
    }
}
