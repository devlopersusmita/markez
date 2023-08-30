<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstitutionBannerSetting extends Model
{
    use HasFactory;
    protected $table ='institution_banner_settings';
     protected $fillable = [

                    'slider',
            'slider_header',
            'description',
            'link',
            'institution_id',
                    'created_at',
                    'updated_at',
                    'slider_text',




    ];
}
