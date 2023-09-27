<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstitutionContactus extends Model
{
    use HasFactory;
    protected $table ='institution_contact_us';
     protected $fillable = [
        'firstname',
        'institution_id',
        'lastname',
        'email',
        'phone',
        'address',
        'helpyou',
        'created_at',
        'updated_at',


    ];


}
