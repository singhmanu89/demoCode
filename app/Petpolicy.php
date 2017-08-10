<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Petpolicy extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'petpolicy';
    
    protected $fillable = [
          'name',
          'parentId'
    ];
    

    public static function boot()
    {
        parent::boot();

        Petpolicy::observe(new UserActionsObserver);
    }
    
    
    
    
}