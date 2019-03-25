<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;


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
            $feedbacks = DB::table('feedbacks')->paginate(5);
            return view('/feedback', compact('feedbacks'));
        } else {
            return view('/auth/login');
        }  
    }

    public function addNewFeedback(){
        return view('/auth/login');
    }
}
