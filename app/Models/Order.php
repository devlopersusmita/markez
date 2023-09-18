<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
     protected $fillable = [
        'status',
        'user_id',
        'course_id',
        'institution_id',
        'total',
        'created_by',
        'institution_subcription_package_id',
        'days',
        'start_date',
        'end_date'
    ];

    public function createdby()
    {
        return $this->belongsTo('App\Models\User'::class,'created_by');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User'::class,'user_id');
    }

}
