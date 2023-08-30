<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;
    protected $table ='form';
    protected $fillable = [
        'form_name',
        'page_id',
        'institution_id',
        'form_status',
        'created_at',
        'updated_at',
    ];
}
