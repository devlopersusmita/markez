<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseContent extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'status',
        'course_id',
        'visibility',        
        'type',
        'content',
        'video_url',
        'zoom_url',
        'start_date',
        'end_date',       
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

   
}
