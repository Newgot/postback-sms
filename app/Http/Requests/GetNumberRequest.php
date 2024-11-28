<?php

namespace App\Http\Requests;

use App\Services\Params\GetNumberServiceParams;
use Illuminate\Foundation\Http\FormRequest;

class GetNumberRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'country' => [
                'required',
                'string',
            ],
            'service' => [
                'required',
                'string',
            ],
            'rent_time' => [
                'required',
                'numeric',
                'min:0.01',
            ],
        ];
    }

    public function toServiceParams(): GetNumberServiceParams
    {
        return new GetNumberServiceParams(
            country: $this->input('country'),
            service: $this->input('service'),
            rentTime: $this->input('rent_time')
        );
    }
}
