<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'property';
    
    protected $fillable = [
        'user_id',
          'propertytype_id',
          'address',
          'street',
          'city',
          'state',
          'zip',
          'multipleunit',
          'unit_name',
          'cover_image'
    ];
    

    public static function boot()
    {
        parent::boot();

        Property::observe(new UserActionsObserver);
    }
    
    public function propertytype()
    {
        return $this->hasOne('App\PropertyType', 'id', 'propertytype_id');
    }


    
    
    
}