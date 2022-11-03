<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Roles;
use App\Models\User;

class LoginController extends Controller
{
    //
    public function index()
    {

        return view('Login');
    }
    public function errorpage()
    {

        return view('404page');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // Session::flush();
        // Auth::logout();
        // $users = Roles::Roles('Admin', 'Super Admin')->get();
        // if ($request->user()->role === $role) {


        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {

            $user = Auth::user();
            $role = Roles::with('users:role_id')->where('id', $user->role_id)->get();
           
            if ($role[0]->name == 'Admin') {
                // dd(  $user );
                return redirect()->intended('admindashboard');
            }
            if ($role[0]->name == 'User') {
                // exit();
                return redirect()->intended('userdashboard');
            }
            // die($request->password);
            // if successful -> redirect forward
        }

        // if unsuccessful -> redirect back
        return redirect()->back()->withErrors([
            'message', 'Login details are not valid',
        ]);
    }

    // public function dashboard()
    // {
    //     // if(Auth::check()){
    //     //     $id =  Auth::id();
    //     // print_r($id);
    //     $user = Auth::user();
    //     // print_r($user->name);
    //         return view('dashboard', ['username' => $user->name]);
    //     // }

    //     // return redirect("login")->with('message', 'You are not allowed to access');
    // }
    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }

    public function test() {
        //   $Roles = new Roles();
        
       $comments = Roles::with('userrr')->get();
        dd($comments);
        // $role = 'User';
        // // $check = User::with(['roles' => function($check) {
        // //     $check = $check->where('name', 'User');
        // // }])->get();
        // $check = User::with('roles')->whereHas('roles', function ($query) {
        //     $query->where('name', 'User');
        // })->first();
        // dd($check->roles->name);
    }
}
