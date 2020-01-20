<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Complaint;
use App\Task;

class ComplaintTaskController extends Controller
{
    public function index(){
        $tasks = Task::orderBy('created_at','desc')->paginate(10);
        return view('admin.terkonfirmasi', ['tasks' => $tasks]);
    }

    public function store(Complaint $complaint){
        $complaint->addTask(request('nama'), request('masukan'));

        return back();

    }

    public function update(Task $task){
        $task->update([
            'completed' =>request()->has('completed')
        ]);

        return back();
    }
}
