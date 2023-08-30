<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;
    protected $table ='faq';
    protected $fillable = [
        'title',
        'slug',
        'contents',
        'created_by',
        'status',
        'order_no',
        'institution_id',

    ];
    public function createdby()
    {
        return $this->belongsTo('App\Models\User'::class,'created_by');
    }
}
