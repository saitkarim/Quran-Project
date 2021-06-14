<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    public function index(){
        return view('home');
    }
    public function login(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }

    public function save(Request $request){
       //Vaidate request
       $request -> validate([
            'name' => 'required',
            'email' => 'required | email | unique:admins',
            'password' => 'required | min:5 | max:12'
       ]);

       //Insert data into database
       $admin = new Admin;
       $admin->name = $request->name;
       $admin->email = $request->email;
       $admin->password = Hash::make($request->password);

       $save = $admin->save();

       if($save){
            return back()->with('success', 'New User has been successfully added to databese');
       }
       else{
           return back()->with('fail', 'Something went wrong, try again later');
       }

    }

    public function check(Request $request){
        //Validate request
        $request -> validate([
            'email' => 'required | email',
            'password' => 'required | min:5 | max:12'
        ]);

        $userInfo = Admin::where('email', '=', $request->email)->first();

        if(!$userInfo){
            return back()->with('fail', 'We do not recognize your email address');
        }
        else{
            //check password
            if(Hash::check($request->password, $userInfo->password)){
                $request->session()->put('LoggedUser', $userInfo->id);
                return redirect('home')->with('success', 'You are in!');
            }else{
                return back()->with('fail', 'Incorrect password');
            }
        }
    }

    public function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/auth/login');
        }
    }

    public function dashboard(){
        $data = ['LoggedUserInfo'=>Admin::where('email', '=', session('LoggedUser'))->first()];
        return view('admin.dashboard', $data);
    }
}
