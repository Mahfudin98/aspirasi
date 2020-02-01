<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            'name' => 'required',
            'email' => 'required',
            'password' => 'required | min:8',
        ]);

        $form_data = new User;
        $form_data = array(
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        );

        User::create($form_data);

        return back();
    }
}
