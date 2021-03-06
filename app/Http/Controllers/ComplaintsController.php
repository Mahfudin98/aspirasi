<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Complaint;
use App\Task;
use App\Events\ComplaintNotif;
use App\Notifications\ComplaintPaid;
use App\Notification;
use Illuminate\Support\Facades\Auth;
use Mockery\Matcher\Not;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use App\User;

class ComplaintsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function markAsRead()
    {
        $this->each->markAsRead();
    }

    public function index(){

        $masukan = DB::table('complaints')->where('kategori', 'masukan')->orderBy('created_at','desc')->paginate(10);
        $keluhan = DB::table('complaints')->where('kategori', 'keluhan')->orderBy('created_at','desc')->paginate(10);
        $tasks = Task::all();
        return view('admin.masukan', ['masukan' => $masukan, 'keluhan' => $keluhan, 'tasks'=>$tasks]);
    }

    public function show($id){
        $complaints = DB::table('complaints')->where('id',$id)->get()->groupBy('complaints');
        $tasks = Task::where('complaint_id', $id)->get();
        $complaint = Complaint::find($id);
        $complaint->unreadNotifications->markAsRead();
        return view('admin.views',['complaints'=> $complaints, 'tasks'=>$tasks]);
    }

    public function notif(){
        $notif = Notification::markAsRead();
        // $complaint = Complaint::find('id');

        // $complaint->notify(new ComplaintPaid($complaint));
        // // $complaint->unreadNotifications->markAsRead();

        // // return 'done';
        // foreach ($notif as $notification) {
        //     echo $notification->data['nama'];
        // }

        return 'done';
    }

    public function destroy($id){
        $complaint = Complaint::find($id);
        $complaint->delete();

        return redirect('/complain');
    }
}
