<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Privacypolicy extends Model
{
    use HasFactory;
    protected $table ='privacy_policy';
     protected $fillable = [
        'name',
        'privacy_policy',
        'created_at',
        'updated_at',



    ];
}
