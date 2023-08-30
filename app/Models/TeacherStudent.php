<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherStudent extends Model
{
    use HasFactory;
    protected $fillable = [
        'teacher_id',
        'user_id',
        'created_by',
               
    ];
    public function createdby()
    {
        return $this->belongsTo('App\Models\User'::class,'created_by');
    }
    public function teacher()
    {
        return $this->belongsTo('App\Models\user'::class,'teacher_id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User'::class,'user_id');
    }
}
