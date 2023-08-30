<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable = [
        'online_class_id',
        'user_id',          
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
    public function onlineclass()
    {
        return $this->belongsTo('App\Models\online_classe'::class,'online_class_id');
    }
}
