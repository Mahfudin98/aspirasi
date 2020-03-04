<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\Complaint;
use App\Task;
use App\Notification;
use App\Notifications\ComplaintPaid;
use App\Events\ComplaintNotif;

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

    public function create(){
        return view('/');
    }

    public function store(Request $request){
        $request->validate([
            'nama'          => 'required',
            'keterangan'    => 'required',
            'email'         => 'required',
            'file'          => 'nullable|image|max:2048',
            'masukan'       => 'required',
            'jenis_privasi' => 'required',
            'kategori'      => 'required',
        ]);

        if($request->hasFile('file')) {
            // Get filename with extension
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('file')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('file')->move(public_path('file'), $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        $form_data =  new Complaint();
        $form_data = array(
            'nama'           => $request->nama,
            'keterangan'     => $request->keterangan,
            'email'          => $request->email,
            'file'           => $fileNameToStore,
            'masukan'        => $request->masukan,
            'jenis_privasi'  => $request->jenis_privasi,
            'kategori'       => $request->kategori
         );

         $complaint = Complaint::create($form_data);

         $complaint->notify(new ComplaintPaid($complaint));

         event(new ComplaintNotif($complaint));

         return redirect('/');
    }
}
