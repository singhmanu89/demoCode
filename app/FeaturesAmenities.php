<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class FeaturesAmenities extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'featuresamenities';
    
    protected $fillable = [
          'name',
          'parentId'
    ];
    

    public static function boot()
    {
        parent::boot();

        FeaturesAmenities::observe(new UserActionsObserver);
    }
    
    
    
    
}