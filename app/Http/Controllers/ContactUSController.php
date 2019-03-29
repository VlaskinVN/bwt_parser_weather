<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ContactUsRequest;
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

    public function addNewFeedback(ContactUsRequest $request){   
        $name = $request->get('username');
        $email = $request->get('email');
        $feedback = $request->get('text');

        DB::table('feedbacks')->insert(
            ['nameUser' => $name, 'email' => $email, 'feedbackText' => $feedback]
        );        

        $text = 'You add new feedback!';

        return view('contactUs', compact('text'));
    }
}
