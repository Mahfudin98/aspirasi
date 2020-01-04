<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $fillable = [
        'id', 'nama', 'keterangan', 'email', 'file', 'masukan', 'jenis_pivasi', 'kategori'
    ];
}
