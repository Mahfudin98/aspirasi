<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    // protected $fillable = [
    //     'id', 'nama', 'keterangan', 'email', 'file', 'masukan', 'jenis_pivasi', 'kategori'
    // ];

    protected $guarded = [];

    public function task(){
        return $this->hasMany(Task::class);
    }

    public function addTask($nama, $masukan){

        return Task::create([
            'complaint_id' => $this->id,
            'nama' => $nama,
            'masukan' => $masukan,
        ]);
    }
}
