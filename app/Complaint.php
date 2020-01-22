<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Complaint extends Model
{
    // protected $fillable = [
    //     'id', 'nama', 'keterangan', 'email', 'file', 'masukan', 'jenis_pivasi', 'kategori'
    // ];

    use Notifiable;

    protected $guarded = [];

    public function task(){
        return $this->hasMany(Task::class);
    }

    public function notif(){
        return Notification::find('notiable_id');
    }

    public function addTask($nama, $masukan){

        return Task::create([
            'complaint_id' => $this->id,
            'nama' => $nama,
            'masukan' => $masukan,
        ]);
    }
}
