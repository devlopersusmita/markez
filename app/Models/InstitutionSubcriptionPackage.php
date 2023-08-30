<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstitutionSubcriptionPackage extends Model
{
    use HasFactory;
    protected $table ='institution_subscription_packages';
    protected $fillable = [

        'title',
        'order_no',
        'price',
        'days',
        'created_by',
        'created_at',
        'updated_at',


    ];
}
