<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SpaController extends Controller
{
    function loginPost(Request $request){
        $user = User::where('email' , '=' , 'admin')->first();

        if($user){
            if(Hash::check($request->password , $user->password) ){
                $request->session()->put('loginId' , $user->id);
                return redirect('/admin/index')->with("success" , "Welcome Back Admin , login has success");
            }  else{
                return back()->withErrors(
                    [
                        'email' => "Email ou mot de passe incorrect."
                    ]
                )->onlyInput('email');
            }
        }else{
            return back()->withErrors([
                'email'=> "Email Not found"
            ])->withInput();
        }
    }
    public function logout(){
        $data = array();
        if(Session::has('loginId')){
            Session::pull('loginId');
        }
        return redirect('/admin/login');
    }
}
