<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $users = DB::table('users')->get();
        return view('admin.listadmin', ['users' => $users]);
       //  return dd($users->last());
    }

    public function create(){
        return view('admin.listadmin');
    }

    public function store(Request $request){
        $request->validate([
            'name'        => 'required',
            'email'       => 'required',
            'password'    => 'required | string | min:8',
            'jabatan'     => 'required',
            'phonenumber' => 'nullable | min:11',
            'images'      => 'nullable|image|max:2048',
        ]);

        if($request->hasFile('images')) {
            // Get filename with extension
            $filenameWithExt = $request->file('images')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('images')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('images')->move(public_path('images'), $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $form_data = new User;
        $form_data = array(
            'name'        => $request->name,
            'email'       => $request->email,
            'password'    => Hash::make($request->password) ,
            'jabatan'     => $request->jabatan,
            'phonenumber' => $request->phonenumber,
            'images'       => $fileNameToStore,
        );

        User::create($form_data);

        return back();
    }

    public function destroy($id){
        $users = User::where('id', $id);
        $users->delete();

        return back();
    }

    public function edit($id){
        $users = User::find($id);

        return view('admin.listadmin', ['users' => $users]);
    }

    public function update(Request $request, $id){
        $users = User::find($id);

        if($request->hasFile('images')) {
            // Get filename with extension
            $filenameWithExt = $request->file('images')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('images')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('images')->move(public_path('images'), $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        $users->jabatan = $request->jabatan;
        $users->phonenumber = $request->phonenumber;
        $users->images = $fileNameToStore;

        $users->save();

        return back();
    }


}
