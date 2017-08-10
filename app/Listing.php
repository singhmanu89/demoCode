<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Listing extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'listing';
    
    protected $fillable = [
          'property_id',
          'propertytype_id',
          'bedrooms',
          'full_bathroom',
          'half_bathroom',
          'sq_footage',
          'headline',
          'description',
          'petpolicy_id',
          'featuresamenities_id',
          'any_other_amenities',
          'month_rent',
          'security_rent',
          'in_month_duration',
          'when_avaliable',
          'move_in_date',
          'video_link',
          'screening_credit',
          'background_check',
          'short_link'
    ];
    

    public static function boot()
    {
        parent::boot();

        Listing::observe(new UserActionsObserver);
    }
    
    public function property()
    {
        return $this->hasOne('App\Property', 'id', 'property_id');
    }


    public function propertytype()
    {
        return $this->hasOne('App\PropertyType', 'id', 'propertytype_id');
    }


    public function petpolicy()
    {
        return $this->hasOne('App\Petpolicy', 'id', 'petpolicy_id');
    }


    public function featuresamenities()
    {
        return $this->hasOne('App\FeaturesAmenities', 'id', 'featuresamenities_id');
    }


    
    
    
}