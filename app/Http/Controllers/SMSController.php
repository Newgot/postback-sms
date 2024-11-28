<?php

namespace App\Http\Controllers;

use App\Http\Requests\CancelNumberRequest;
use App\Http\Requests\GetNumberRequest;
use App\Http\Requests\GetSMSRequest;
use App\Http\Requests\GetStatusRequest;
use App\Models\Number;
use App\Resources\NumberResource;
use App\Resources\SMSResource;
use App\Resources\StatusSMSResource;
use App\Services\SMSService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class SMSController extends Controller
{
    public function __construct(
        protected readonly SMSService $smsService,
    )
    {
    }

    public function index(): AnonymousResourceCollection
    {
        return NumberResource::collection(Number::all());
    }

    public function getNumber(GetNumberRequest $request): NumberResource
    {
        return NumberResource::make(
            $this->smsService->getNumber($request->toServiceParams())
        );
    }

    public function cancelNumber(CancelNumberRequest $request): JsonResource
    {
        $this->smsService->cancelNumber($request->getActivation());
        return JsonResource::make([]);
    }

    public function getSMS(GetSMSRequest $request): SMSResource
    {
        return SMSResource::make(
            $this->smsService->getSMS($request->getActivation())
        );
    }

    public function getStatus(GetStatusRequest $request): StatusSMSResource
    {
        StatusSMSResource::make(
            $this->smsService->getStatus($request->getActivation())
        );

    }
}
