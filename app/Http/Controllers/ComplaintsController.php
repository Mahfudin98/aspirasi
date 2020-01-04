<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Complaint;

class ComplaintsController extends Controller
{
    public function index(){
        $complaints = DB::table('complaints')->paginate(10);
        return view('admin.masukan', compact('complaints'));
    }

    public function show($id){
        $complaints = DB::table('complaints')->where('id',$id)->get()->groupBy('complaints');        
        return view('admin.views',['complaints'=> $complaints]);
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
