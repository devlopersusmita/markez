<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstitutionSubcription extends Model
{
    use HasFactory;
    protected $table = 'institution_subscriptions';
    protected $fillable = [
        'user_id',
        'institution_subcription_package_id',
        'created_by',
        'days',
        'start_date',
        'end_date'

    ];
    public function createdby()
    {
        return $this->belongsTo('App\Models\User'::class,'created_by');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User'::class,'user_id');
    }
    public function institution_subscription_package()
    {
        return $this->belongsTo('App\Models\InstitutionSubcriptionPackage'::class,'institution_subcription_package_id');
    }

}
