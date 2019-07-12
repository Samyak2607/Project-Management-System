<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Auth;
use DB;

class LoginController extends Controller
{
    

    use AuthenticatesUsers;

    
    protected $redirectTo = '/home';

    
    public function __construct(){
        $this->middleware('guest')->except('logout');
    }

    public function ShowLoginForm(){
       
        return view('Auth.login');
    }

    public function LoginAuth(Request $request){

        $username=$request->input('username');
        $password=$request->input('password');
        
        

        $credentials= array(
            'username'=>$username,
            'password' => $password,
        );

        if(\Auth::attempt($credentials)){

            $designation=Auth::user()->designation;
            //return $designation;
            if($designation=='Admin'){
                return redirect()->intended('admin-dashboard');
            }

            else if($designation=='Manager'){
                $id=Auth::user()->id;
                // $data=DB::table('task')->where('user_id',$id)->first();
                // if(count($data)>0){
                //     return redirect()->route('manager-dashboard',$id);
                //     //return redirect()->route('manager-dashboard',$id);

                // }
                return redirect()->route('manager-dashboard',$id);
                
            }

            else if($designation=='Employee'){
                $id=Auth::user()->id;
                //return 'done';
                return redirect()->route('employee.dashboard',$id);
            }

            else if($designation=='Intern'){
                return redirect()->intended('intern-dashboard');
            }

            else if($designation=='other'){
                return redirect()->intended('other-dashboard');
            }

            else{
                \Session::flash('danger', 'Fill designation');
                return redirect()->back();
            }
        }

        else{
            \Session::flash('danger', 'user not exits');
            return redirect()->back();
        }

    }

    public function Admindashboard(){
        $data = DB::table('tags')->get();
        $project=DB::table('projects')->get();

        return view('Admin.dashboard',compact('data', 'project'));
    }

    public function logout(){
        \Auth::logout();
        return redirect()->intended('login');
    }

    public function edit($username){
        return view('Admin.Update');
    }

    public function AdminProfile(Request $request){
        return view('Admin.Profile');
    }

    public function update(Request $request)
    {
        $profile = Auth::user();
        //return 'done';
        $this->validate(request(), [
            'username' => 'required','unique:users',
            'email' => 'required','unique:users',
            'contact' => 'required','unique:users',
        ]);

        

        $profile->update([
            'username' => $request->username,
            'email' => $request->email,
            'contact'=>$request->contact,
        ]);

        $profile->save();
    
         \Session::flash('success', 'successfully profile updated');
        return redirect()->intended('admin-dashboard');
        
    }
}
