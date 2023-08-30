<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstitutionTeacherRequest extends Model
{
    use HasFactory;
    protected $table = 'institution_teacher_request';
    protected $fillable = [
        'institution_id',
        'student_id',
        'status',
        'created_at',
        'updated_at'

    ];


}
