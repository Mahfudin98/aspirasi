<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\Complaint;

class PostController extends Controller
{
    public function index(){
        $complaints = DB::table('complaints')->orderBy('created_at','desc')->paginate(10);
        $posts = DB::table('posts')->orderBy('created_at','desc')->paginate(10);
        return view('welcome', ['posts' => $posts, 'complaints' => $complaints]);
    }

    public function show($id){
        // $posts = DB::table('posts')->where('id',$id)->get()->groupBy('posts');
        // return view('welcome',['posts'=> $posts]);
    }

    public function create(){
        return view('/home');
    }

    public function store(Request $request){
        $request->validate([
            'title'      => 'required',
            'content'    => 'required',
            'image'      => 'nullable|image|max:2048',
            'author'     => 'required',
        ]);

        if($request->hasFile('image')) {
            // Get filename with extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('image')->move(public_path('image'), $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        $form_data =  new Post();
        $form_data = array(
            'title'       => $request->title,
            'content'     => $request->content,
            'image'       => $fileNameToStore,
            'author'      => $request->author,
         );

         Post::create($form_data);

         return redirect('/home');
    }
}
