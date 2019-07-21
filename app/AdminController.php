<?php

namespace App\Http\Controllers;

use App\User;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use DB;
use Auth;


class AdminController extends Controller
{

	public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => 'required|string|max:255|unique:projects',
            'company_name' =>'required|string|max:255',
            'details' =>'required|string',
            'imp_key_points'=>'reqiured|string',
        ]);
    }

    

    public function AddProject(){
        $tags = DB::table('tags')->get();
        return view('Projects.AddProject',compact('tags'));
    }

    public function SaveProject(Request $request){

        //return $request->all();
        $title=$request->input('title');
        $company=$request->input('company_name');
        //$data['details']=$request->input('details');       
        $tag=$request->input('tag');

            $user = Project::updateOrCreate([
                'title' => $title,
                'company_name' => $company,
                'tag' => $tag,
            ]);  

               
         // $save = \DB::insert('insert into projects (title,company_name,tag) values(?,?,?)',[$data]);


        \Session::flash('success', 'Project Add Successfully');
        // dd($save);   
            
         // return \Redirect::back()->withInput();   

         return redirect()->back();  
       
    }

    public function ShowProject(){
        $project=DB::table('projects')->get();
        return view('Projects.ExistingProject',compact('project'));
    }
    
    public function AdminProfile(){
        return view('Admin.Profile');
    }

    public function search(Request $request){
        $skill=$request->input('search');
        $option=$request->input('search_option');
        if(empty($skill) || $option == null){
            return redirect()->back();
        }
        
        if($option=='User'){
            //return 'Users table Search';
            $user=DB::table('users')->select('username','department')->where('skills',$skill)->orwhere('department',$skill)->get();


            return view('Admin.dashboard',compact('user'));

        }
        
        elseif($option=='Project'){
            $project=DB::table('projects')->select('title','details')->where('tag',$skill)->get();
            return view('Admin.dashboard',compact('project'));
            
        }
        
        else{
            $task=DB::table('task')->select('title','details')->where('tag_id',$skill)->get();
            return view('Admin.dashboard',compact('task'));
        }
        // if($option='User'){
        //     $user=DB::('users')->select('username')->where('skills',$skill)->get();
        //     return
        // }
        // $user=DB::table('users')->select('id','username')->where('skills',$q)->get();
        // // return 'done';
        // foreach ($user as $object){

            
        
        // $user_task=DB::table('task')->select('title')where('user_id',$object->id)->get();
        // echo $user_task;
        // }
        
           
    }

    public function Addtags(){
        return view('Admin.tag');
    }

    public function save_tag(Request $request){
        
        $tag=$request->input('tags');
        
        
        \DB::insert('insert into tags (skills) values(?)',[$tag]);

        \Session::flash('success', 'tag added Successfully');
             
            
        return Redirect()->intended('admin/new-project');
    }
}
