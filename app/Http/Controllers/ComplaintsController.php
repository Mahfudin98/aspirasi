<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Complaint;
use App\Task;

class ComplaintsController extends Controller
{
    public function index(){

        $masukan = DB::table('complaints')->where('kategori', 'masukan')->orderBy('created_at','desc')->paginate(10);
        $keluhan = DB::table('complaints')->where('kategori', 'keluhan')->orderBy('created_at','desc')->paginate(10);
        $tasks = Task::all();
        return view('admin.masukan', ['masukan' => $masukan, 'keluhan' => $keluhan, 'tasks'=>$tasks]);
    }

    public function show($id){
        $complaints = DB::table('complaints')->where('id',$id)->get()->groupBy('complaints');
        $tasks = Task::where('complaint_id', $id)->get();
        return view('admin.views',['complaints'=> $complaints, 'tasks'=>$tasks]);
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

         Complaint::create($form_data);

         return redirect('/');
    }
}
