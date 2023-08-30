<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;
    protected $table ='theme';

    protected $fillable = [
        'theme_name',
        'theme_image',
        'created_at',
        'updated_at',

    ];


}
