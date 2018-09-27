<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Member extends Model
{
    /**
     * {@inheritdoc}
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'birthday',
        'phone',
        'address'
    ];

    /**
     * Member can have one profile
     * @return HasOne
     */
    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }
}
