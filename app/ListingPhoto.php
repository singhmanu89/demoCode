<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class ListingPhoto extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'listingphoto';
    
    protected $fillable = [
          'photo',
          'description',
          'listing_id'
    ];
    

    public static function boot()
    {
        parent::boot();

        ListingPhoto::observe(new UserActionsObserver);
    }
    
    public function listing()
    {
        return $this->hasOne('App\Listing', 'id', 'listing_id');
    }


    
    
    
}