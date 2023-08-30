<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizResponseDetails extends Model
{
    use HasFactory;
    protected $table = 'quiz_response_details';
     protected $fillable = [ 
        'quiz_response_id',       
        'course_content_quiz_id',
        'user_id',
        'question_id',   
        'correct_option',       
        'user_response',
        'score'

    ];
   
    public function user()
    {
        return $this->belongsTo('App\Models\User'::class,'user_id');
    }
    public function quiz_response()
    {
        return $this->belongsTo('App\Models\QuizResponse'::class,'quiz_response_id');
    }
    public function quiz()
    {
        return $this->belongsTo('App\Models\Quiz'::class,'course_content_quiz_id');
    }
    public function question()
    {
        return $this->belongsTo('App\Models\Question'::class,'question_id');
    }
    
}
