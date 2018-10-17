<?php

namespace App;

use App\Events\Service\ServiceCreated;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'schedule',
        'note'
    ];

    protected $dispatchesEvents = [
        'created' => ServiceCreated::class
    ];
}
