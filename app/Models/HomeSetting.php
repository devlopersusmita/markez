<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSetting extends Model
{
    use HasFactory;
     protected $fillable = [

        'slider',
'slider_header',
'description',
'link',
        'created_at',
        'updated_at',
        'slider_text',




    ];
}
