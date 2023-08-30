<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
     protected $fillable = [
        'title',
        'slug',
        'description',
        'status',
        'user_id',
        'preview_image',
        'preview_video',
        'price',
        'students_limit',
        'tags',
        'visibility',
        'is_fully_complete',
        'category_id',
        'type',
        'start_date',
        'end_date',
        'average_rating',
        'total_comments',
        'created_by',


    ];
    public function createdby()
    {
        return $this->belongsTo('App\Models\User'::class,'created_by');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User'::class,'user_id');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category'::class,'category_id');
    }
}
