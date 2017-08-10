<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class AdditionalMoveInCosts extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'additionalmoveincosts';
    
    protected $fillable = [
          'property_id',
          'memo',
          'amount',
          'dueon',
          'securitydeposit_id'
    ];
    

    public static function boot()
    {
        parent::boot();

        AdditionalMoveInCosts::observe(new UserActionsObserver);
    }
    
    public function property()
    {
        return $this->hasOne('App\Property', 'id', 'property_id');
    }


    public function securitydeposit()
    {
        return $this->hasOne('App\SecurityDeposit', 'id', 'securitydeposit_id');
    }


    
    
    
}