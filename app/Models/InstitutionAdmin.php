<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstitutionAdmin extends Model
{
    use HasFactory;
    protected $table ='institution_admins';
    protected $fillable = [
        'institution_id',
        'user_id',
        'created_by',
        'access',

    ];

}
