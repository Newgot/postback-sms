<?php

namespace App\Resources;

use App\Models\Number;
use App\ObjectValues\Entities\StatusSMSEntity;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property StatusSMSEntity $resource
 */
class StatusSMSResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'status' => $this->resource->status,
            'count_sms' => $this->resource->countSMS,
            'end_rent_date' => $this->resource->endRentDate,
        ];
    }
}
