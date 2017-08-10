<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class AddAnAccount extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'addanaccount';
    
    protected $fillable = [
          'user_id',
          'nameOfcard',
          'cardNo',
          'month',
          'year',
          'securityCode',
          'billingaddress',
          'address',
          'city',
          'state',
          'zip',
          'nickname'
    ];
    

    public static function boot()
    {
        parent::boot();

        AddAnAccount::observe(new UserActionsObserver);
    }
    
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }


    
    
    
}