<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $guarded = [];
    protected $casts = [
        'data' => 'array',
        'read_at' => 'datetime',
    ];
}
