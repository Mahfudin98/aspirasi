<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Complaint;
use App\Task;
use App\Notifications\ComplaintPaid;
use Illuminate\Support\Facades\DB;
use App\Notification;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = DB::table('posts')->orderBy('created_at','desc')->paginate(10);
        $complaint = Complaint::all();
        $user = User::all();
        $noification = Notification::orderBy('created_at','desc')->paginate(3);
        $task = Task::all();
        $persen = DB::table('tasks');
        return view('home', ['posts' => $posts, 'complaint' => $complaint, 'user' => $user, 'notification'=>$noification, 'task'=>$task, 'persen'=>$persen]);
    }

    public function deletNotif(){
        Notification::delete();

        return back();
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

    public function destroy($id)
    {
        $posts = DB::table('posts')->where('id',$id);
        $posts->delete();

        return redirect()->route('home.index');
    }

    public function img($id){
        $image = DB::table('posts')->where('id', $id);
        $filename = public_path().'/image/'.$image;
        $image->delete($filename);

        return redirect()->route('home.index');
    }

    public function edit($id){
        $posts = Post::find($id);
        return view('home', compact('posts'));
    }

    public function update(Request $request,$id){
        $posts = Post::find($id);

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

         $posts->title = $request->title;
         $posts->content = $request->content;
         $posts->image = $fileNameToStore;
         $posts->author = $request->author;
         $posts->update($request->all());

         return redirect('/home');
    }
}
