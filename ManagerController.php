<?php

namespace App\Http\Controllers;

use App\User;
use App\Task;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Session;
use Auth;
use DB;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    
    public function show(){
        $id=Auth::user()->id;
        $project = DB::table('projects')->get();
        $task=DB::table('task')->select('id','title')->where('user_id',$id)->orwhere('observer',$id)->get();
        //dd($task);
        if(count($task)>0)
            return view('Manager.dashboard',compact('project','task'));
        return view('Manager.dashboard',compact('data'));
    }

    
    public function profile()
    {
        return view('Admin.Profile');
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id){
        //
    }

    public function project($project){
        //return 'done';
         $project_details = DB::table('projects')->select('title','company_name','details')->where('title',$project)->first(); 
         
         return view('Projects.details',compact('project_details'));
    }

    public function task(){
        $all_user = DB::table('users')->select('id','username','designation')->get();
        $tag=DB::table('tags')->select('skills')->get();
        return view('Manager.task',compact('all_user','tag'));
    }

    public function taskstore(Request $request){
        
        $title=$request->input('title');
        $user=$request->input('user_id');
        $details=$request->input('details');
        $observer=$request->input('observer_id');
        $tag_id=$request->input('tag_id');

        \DB::insert('insert into task (title,user_id,details,observer,tag_id) values(?,?,?,?,?)',[$title,$user,$details,$observer,$tag_id]);

        return redirect()->intended('manager-dashboard');
    }

    public function task_details($title){
        
        $task=Task::with('observer_name')->select('title','details','observer')->where('title',$title)->first();
        // return $task_details;
        return view('Projects.task_info',compact('task'));
    }
}
