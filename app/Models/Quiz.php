<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'status',
        'course_content_id',
        'all_questions',
        'start_date',        
        'end_date',       
        'created_by',
               
    ];
    protected $table = 'quizes';
    public function createdby()
    {
        return $this->belongsTo('App\Models\User'::class,'created_by');
    }
    public function coursecontent()
    {
        return $this->belongsTo('App\Models\CourseContent'::class,'course_content_id');
    }
}
