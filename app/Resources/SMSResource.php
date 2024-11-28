<?php

namespace App\Resources;

use App\Models\Number;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property string $resource
 */
class SMSResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'message' => $this->resource,
        ];
    }
}
