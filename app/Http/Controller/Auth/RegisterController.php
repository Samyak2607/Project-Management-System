<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    

    use ResetsPasswords;

    
    protected $redirectTo = '/home';

    
    public function __construct(){
        $this->middleware('guest');
    }

    public function showLinkRequestForm(){
        return view('Auth.forgot');
    }

    public function ResetsPasswords(Request $request){
        return $request->all();
    }
}
