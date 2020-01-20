<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];

    public function complaint(){
        return $this->belongsTo(Complaint::class);
    }
}
