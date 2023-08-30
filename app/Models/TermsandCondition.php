<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TermsandCondition extends Model
{
    use HasFactory;
    protected $table ='terms_and_condition';
     protected $fillable = [

        'terms_contents',
        'created_at',
        'updated_at',


    ];
}
