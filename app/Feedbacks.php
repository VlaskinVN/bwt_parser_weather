<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedbacks extends Model
{
    protected $talbe = 'feedbacks';
    protected $fillable = ['nameUser', 'email', 'feedbackText'];

    /*public function getAllFeedback($countInPage){
        return DB::table('feedbacks')->paginate($countInPage);
    }*/

    /*public function addNewFeedback($username, $email, $feedback){
        DB::table('feedbacks')->insert(
            ['nameUser' => $username, 'email' => $email, 'feedbackText' => $feedback]
        ); 
    }*/
}
