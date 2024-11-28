<?php

namespace App\ObjectValues\Enums;

enum ActionSMSEnum: string
{
    case GetNumber = 'getNumber';

    case CancelNumber = 'cancelNumber';
    case GetSms = 'getSms';

    case GetStatus = 'getStatus';

    public function endpoint(): string
    {
        return config('sms.url') . '/' . $this->value;
    }
}
