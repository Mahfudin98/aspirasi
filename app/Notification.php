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

    public function markAsRead()
    {
        if (is_null($this->read_at)) {
            $this->forceFill(['read_at' => $this->freshTimestamp()])->save();
        }
    }

    public function read()
    {
        return $this->read_at !== null;
    }
}
