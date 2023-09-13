<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVisitor extends Model
{
    use HasFactory;
    protected $table ='users_visitors';
    protected $fillable = [
        'ip_address',
        'created_at',
        'updated_at'

    ];

}
