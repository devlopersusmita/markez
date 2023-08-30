<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizResponse extends Model
{
    use HasFactory;
    protected $table = 'quiz_responses';
     protected $fillable = [        
        'course_content_quiz_id',
        'user_id',
        'total_score',   
        'full_marks',       
        'score_percentage'

    ];
   
    public function user()
    {
        return $this->belongsTo('App\Models\User'::class,'user_id');
    }
    public function quiz()
    {
        return $this->belongsTo('App\Models\Quiz'::class,'course_content_quiz_id');
    }
    public function quiz_response_details()
    {
        return $this->hasMany('App\Models\QuizResponseDetails','quiz_response_id','id');
    }

    
}
