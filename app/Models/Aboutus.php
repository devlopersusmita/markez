<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aboutus extends Model
{
    use HasFactory;
    protected $table ='about_us';
     protected $fillable = [
        'aboutus_content',
        'aboutus_banner',
        'aboutus_siteimage',
        'created_at',
        'updated_at',



    ];
}
