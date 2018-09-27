<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    /**
     * {@inheritdoc}
     */
    protected $fillable = [
        'member_id',
        'church_id',
        'locale',
        'district',
        'division',
        'group'
    ];

    /**
     * A profile belongs to a member
     * @return BelongsTo
     */
    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }
}
