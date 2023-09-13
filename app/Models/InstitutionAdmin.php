<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstitutionAdmin extends Model
{
    use HasFactory;
    protected $fillable = [
        'institution_id',
        'user_id',
        'created_by',
        'access',

    ];
    // public function createdby()
    // {
    //     return $this->belongsTo('App\Models\User'::class,'created_by');
    // }
    // public function institution()
    // {
    //     return $this->belongsTo('App\Models\Institution'::class,'institution_id');
    // }
    // public function user()
    // {
    //     return $this->belongsTo('App\Models\User'::class,'user_id');
    // }
}
