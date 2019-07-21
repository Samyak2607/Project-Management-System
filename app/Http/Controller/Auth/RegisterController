<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Session;
use DB;

use Illuminate\Support\Facades\Input;

class RegisterController extends Controller
{
   

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function show(){
         $data = DB::table('tags')->get();

         return view('Auth.register',compact('data'));
    }

    public function create_reg(Request $request){

     

        // $this->validate($request, [
        //     'username' => ['required', 'string', 'max:255', 'unique:users'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],

        // ]);

        
                $name=$request->input('username');
                $password=Hash::make($request->input('password'));
                $designation=$request->input('designation');
                $email=$request->input('email');
                $contact=$request->input('contact');
                $skills=$request->input('skills');
                $department=$request->input('department');

             $users = User::where('email', $request->email)->first();

               if (empty($users)){

                $user=new User();
                    $user->username=$name;
                    $user->password=$password;
                    $user->email=$email;
                    $user->designation=$designation;
                    $user->contact=$contact;
                    $user->skills=$skills;
                    $user->department=$department;
                    $user->save(); 

                }

                else{

                        \Session::flash('success','Successfully Register');
                        return redirect()->route('admin-dashboard');
                    }

                       
                   

                //return $user;
                // \DB::insert('insert into users (username,password,email,designation,contact,skills,department) values(?,?,?,?,?,?,?)',[$name,$password,$email,$designation,$contact,$skills,$department]);

                // \DB::insert('insert into tags(skills) values(?)',[$skills]); 
             // dd($data);
              //die();

            \Session::flash('success','Successfully Register');
                    
                return redirect()->route('admin-dashboard');
    }
    
}
