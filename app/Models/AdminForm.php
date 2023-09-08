<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminForm extends Model
{
    use HasFactory;
    protected $table ='admin_form';
    protected $fillable = [
        'form_name',

        'admin_id',
        'form_status',
        'created_at',
        'updated_at',
    ];
}
