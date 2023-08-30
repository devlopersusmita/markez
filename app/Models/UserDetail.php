<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'country_id',
        'city_id',
        'user_id',
        'created_by',
        'user_type',
        'address',
        'description',
        'subscription_start_date',
        'subscription_end_date'
               
    ];
    public function createdby()
    {
        return $this->belongsTo('App\Models\User'::class,'created_by');
    }
    public function country()
    {
        return $this->belongsTo('App\Models\Country'::class,'country_id');
    }
    public function city()
    {
        return $this->belongsTo('App\Models\City'::class,'city_id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User'::class,'user_id');
    }
}
