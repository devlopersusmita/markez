<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanySetting extends Model
{
    use HasFactory;
     protected $fillable = [
        'name',
        'logo',
        'address',
        'copyright_text',
        'phone',
        'fax',
        'website',
        'country',
        'fav_icon',
        'home_page_short_description',
        'footer_text',
        'facebook_link',
        'instagram_link',
        'twiter_link',
        'linkedin_link',
        'youtube_link',
      

    ];
}
