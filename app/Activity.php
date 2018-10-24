<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    /**
     * {@inheritdoc}
     */
    protected $fillable = [
        'user_id',
        'title',
        'schedule',
        'content'
    ];

    /**
     * {@inheritdoc}
     */
    protected $dates = ['schedule'];

    /**
     * Get the formatted schedule.
     */
    public function getFormattedScheduleAttribute()
    {
        return $this->schedule->format('F j, Y');
    }
}
