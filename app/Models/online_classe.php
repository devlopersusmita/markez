<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\User;

class online_classe extends Model
{
    use HasFactory;
     public $fillable= ['course_id','user_id','meeting_id','topic','start_at','duration','password','start_url','join_url'];

    public function course()
    {
        return $this->belongsTo('App\Models\Course', 'course_id');
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
