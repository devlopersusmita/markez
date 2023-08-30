<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table ='menu';
    protected $fillable = [
        'menu_name',
        'slug',
        'page_id',
        'created_at',
        'updated_at',
        'link',
        'institution_id',
        'sort_order',
        'location',


    ];
}
