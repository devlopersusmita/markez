<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'slug',
        'logo',
        'description',
        'start_date',
        'end_date',
        'created_by',
        'gov-registration-doc',
        'domain-subdomain',
        'phone',
        'password',
        'email',
        'subscription',
        'inst_status',
        'domain_status',
        'payment_status',
    ];
    public function createdby()
    {
        return $this->belongsTo('App\Models\User'::class,'created_by');
    }

}
