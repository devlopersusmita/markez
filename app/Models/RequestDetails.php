<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'sender_type',
        'sender_id',
        'receiver_type',
        'receiver_id',
        'status',
         ];
    public function sender()
    {
        return $this->belongsTo('App\Models\User'::class,'sender_id');
    }
    public function receiver()
    {
        return $this->belongsTo('App\Models\User'::class,'receiver_id');
    }
}
