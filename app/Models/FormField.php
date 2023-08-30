<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormField extends Model
{
    use HasFactory;
    protected $table ='form_field';
    protected $fillable = [
        'form_id',
        'field_type',
        'field_name',
        'field_value',
        'field_option_value',
        'field_order',
        'field_placeholder_value',
        'field_id',
        'field_class',
    ];
}
