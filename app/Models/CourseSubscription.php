<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSubscription extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'course_id',          
        'created_by',
        'payment_note',
               
    ];
    public function createdby()
    {
        return $this->belongsTo('App\Models\User'::class,'created_by');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User'::class,'user_id');
    }
    public function course()
    {
        return $this->belongsTo('App\Models\Course'::class,'course_id');
    }
}
