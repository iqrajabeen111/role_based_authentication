<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //

    public function admindashboard()
    {
        $user = Auth::user();
        // dd( $user->name);
        
        
        return view('AdminDashboard')->with(array('username' => $user->name));
    }
    public function userdashboard()
    {
        $user = Auth::user();
      
           return view('UserDashboard')->with(array('username' => $user->name));
   
    }
}
