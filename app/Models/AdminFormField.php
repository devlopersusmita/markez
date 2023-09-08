<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminFormField extends Model
{
    use HasFactory;
    protected $table ='admin_form_field';
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
