<?php

namespace App\Services;

use App\Models\Number;
use App\ObjectValues\Entities\StatusSMSEntity;
use App\ObjectValues\Enums\ActionSMSEnum;
use App\ObjectValues\Exceptions\SMSAPIException;
use App\Services\Params\GetNumberServiceParams;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class SMSService
{
    public function getNumber(GetNumberServiceParams $params): Number
    {
        $response = $this->send(ActionSMSEnum::GetNumber, $params->toArray());
        $json = $response->json();
        $number = Number::where(['number' => $json['number']])->first();
        if (!$number) {
            $number = Number::create([
                'number' => $json['number'],
                'activation' => $json['activation'],
                'end_date' => $json['end_date'],
            ]);
        }
        return $number;
    }

    public function getSMS(int $activation):  string
    {
        $response = $this->send(ActionSMSEnum::GetSms, [
            'activation ' => $activation,
        ]);
        return $response->json()['sms'];
    }

    public function getStatus(int $activation):  StatusSMSEntity
    {
        $response = $this->send(ActionSMSEnum::GetStatus, [
            'activation ' => $activation,
        ]);
        $json = $response->json();
        return new StatusSMSEntity(
            status: $json['status'],
            countSMS: $json['count_sms'],
            endRentDate: $json['end_rent_date'],
        );
    }

    public function cancelNumber(int $activation): bool
    {
        $this->send(ActionSMSEnum::CancelNumber, [
            'activation ' => $activation,
        ]);
        Number::where(['activation' => $activation])->delete();
        return true;
    }

    protected function send(ActionSMSEnum $action, array $params): Response
    {
        $url = config('sms.url') . '/' . $action->value;
        $params['action'] = $action;
        $params['token'] = config('sms.token');
        $response =  Http::get($url, $params);
        if ($this->checkStatus($response)) {
            throw new SMSAPIException($response->body());
        }
        return $response;
    }

    protected function checkStatus(Response $response): bool
    {
        return
            $response->failed() &&
            $response->getStatusCode() !== 200 &&
            $response->json()['code'] !== 200;
    }
}
