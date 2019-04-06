<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactUsRequest;
use App\Feedbacks;


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
        /*$fm = new FeedbackModel(); 
        $feedbacks = $fm->getAllFeedback(5);*/
        $feedbacks = Feedbacks::paginate(5);
        return view('/feedback', ['feedbacks' => $feedbacks]);
    }

    public function addNewFeedback(ContactUsRequest $request){   

        Feedbacks::create($request->all());

        // $fm->addNewFeedback($request->get('username'), $request->get('email'), $request->get('text'));
        // $text = 'You add new feedback!';

        return redirect()->back()->with('flash-message', 'Thank you for your feedback!');
        //return view('contactUs', compact('text'));
    }
}
