<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $number
 * @property int $activation
 * @property Carbon $end_date
 */
class Number extends Model
{
    protected $table = 'numbers';

    protected $guarded = [];

    protected $casts = [
        'number' => 'integer',
        'activation' => 'integer',
        'end_date' => 'datetime',
    ];
}
