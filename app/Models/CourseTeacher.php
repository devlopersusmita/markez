<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseTeacher extends Model
{
    use HasFactory;
     protected $fillable = [
        'course_id',
        'user_id',
        'created_by',
               
    ];
    public function createdby()
    {
        return $this->belongsTo('App\Models\User'::class,'created_by');
    }
    public function course()
    {
        return $this->belongsTo('App\Models\Course'::class,'course_id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User'::class,'user_id');
    }
}
