<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contactus extends Model
{
    use HasFactory;
    protected $table ='contact_us';
     protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'phone',
        'address',
        'helpyou',
        'created_at',
        'updated_at',


    ];


}
