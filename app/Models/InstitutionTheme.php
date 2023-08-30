<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstitutionTheme extends Model
{
    use HasFactory;

    protected $table ='institution_theme';
    protected $fillable = [
        'institution_id',
        'theme_id',
        'created_at',
        'updated_at',

    ];
}
