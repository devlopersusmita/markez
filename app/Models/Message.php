<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
     protected $fillable = [
        'sender_id',
        'sender_type',
        'receiver_id',
        'receiver_type',
        'created_by',
        'contents',        
        
               
    ];
    /*
    public function createdby()
    {
        return $this->belongsTo('App\Models\User'::class,'created_by');
    }
    public function sender()
    {
        return $this->belongsTo('App\Models\User'::class,'sender_id');
    }
    public function receiver()
    {
        return $this->belongsTo('App\Models\User'::class,'receiver_id');
    }
    */
   
}
