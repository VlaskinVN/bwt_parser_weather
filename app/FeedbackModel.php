<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class FeedbackModel extends Model
{
    //
    public function getAllFeedback($countInPage){
        return DB::table('feedbacks')->paginate($countInPage);
    }

    public function addNewFeedback($username, $email, $feedback){
        DB::table('feedbacks')->insert(
            ['nameUser' => $username, 'email' => $email, 'feedbackText' => $feedback]
        ); 
    }
}
