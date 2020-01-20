<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\Complaint;
use App\Task;

class PostController extends Controller
{
    public function index(){
        $complaints = DB::table('complaints')->orderBy('created_at','desc')->paginate(10);
        $posts = DB::table('posts')->orderBy('created_at','desc')->paginate(10);
        $tasks = Task::orderBy('created_at','desc')->paginate(10);
        return view('welcome', ['posts' => $posts, 'complaints' => $complaints, 'tasks' => $tasks]);
    }

    public function show($id){
        // $posts = DB::table('posts')->where('id',$id)->get()->groupBy('posts');
        // return view('welcome',['posts'=> $posts]);
    }
}
