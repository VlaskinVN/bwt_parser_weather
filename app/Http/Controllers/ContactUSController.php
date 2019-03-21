<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactUSController extends Controller
{
    //
    /*
        *
        *   view for send feedback 
        * 
    */
    public function sendFeedback(){        
        return view('contactUs');              
    }

    public function allFeedback(){
        if (Auth::check()){
            return view('allFeedback');
        } else {
            return view('/auth/login');
        }  
    }

    public function addNewFeedback(){
        return view('/auth/login');
    }
}
