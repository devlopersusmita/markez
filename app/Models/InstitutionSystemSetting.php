<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstitutionSystemSetting extends Model
{
    use HasFactory;
    protected $table ='institution_system_settings';
      protected $fillable = [
        'student_default_subscription_day',
        'teacher_default_subscription_day',
        'institution_default_subscription_day',
        'default_country_id',
        'default_city_id',
        'institution_id',
        'teacher_online_class_before_minute',
        'student_online_class_before_minute',


    ];
}
