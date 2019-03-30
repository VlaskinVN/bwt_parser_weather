<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ContactUsRequest;
use App\FeedbackModel;
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
        $fm = new FeedbackModel(); 
        $feedbacks = $fm->getAllFeedback(5);
        return view('/feedback', compact('feedbacks'));
    }

    public function addNewFeedback(ContactUsRequest $request){   
        $fm = new FeedbackModel(); 
        $fm->addNewFeedback($request->get('username'), $request->get('email'), $request->get('text'));
        $text = 'You add new feedback!';

        return view('contactUs', compact('text'));
    }
}
