<?php

namespace App\Http\Requests;

use App\Services\Params\GetNumberServiceParams;
use Illuminate\Foundation\Http\FormRequest;
use phpDocumentor\Reflection\Types\Integer;

class GetSMSRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'activation' => [
                'required',
                'integer',
            ],
        ];
    }

    public function getActivation(): int
    {
        return $this->get('activation');
    }
}
