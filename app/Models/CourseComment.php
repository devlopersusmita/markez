<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseComment extends Model
{
    use HasFactory;
     protected $fillable = [
        'course_id',
        'user_id',
        'rating',
        'comments',
        'created_by'
          
        
               
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User'::class,'user_id');
    }
    public function course()
    {
        return $this->belongsTo('App\Models\Course'::class,'course_id');
    }
}
