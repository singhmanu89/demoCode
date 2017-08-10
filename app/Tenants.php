<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Tenants extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'tenants';
    
    protected $fillable = [
          'property_id',
          'firstname',
          'lastname',
          'email'
    ];
    

    public static function boot()
    {
        parent::boot();

        Tenants::observe(new UserActionsObserver);
    }
    
    public function property()
    {
        return $this->hasOne('App\Property', 'id', 'property_id');
    }


    
    
    
}