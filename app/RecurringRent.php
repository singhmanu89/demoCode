<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;

use Carbon\Carbon; 

use Illuminate\Database\Eloquent\SoftDeletes;

class RecurringRent extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'recurringrent';
    
    protected $fillable = [
          'property_id',
          'rentamount',
          'monthduedate',
          'FirstpaymentDate',
          'proratedamount'
    ];
    

    public static function boot()
    {
        parent::boot();

        RecurringRent::observe(new UserActionsObserver);
    }
    
    public function property()
    {
        return $this->hasOne('App\Property', 'id', 'property_id');
    }


    
    /**
     * Set attribute to date format
     * @param $input
     */
    public function setMonthduedateAttribute($input)
    {
        if($input != '') {
            $this->attributes['monthduedate'] = Carbon::createFromFormat(config('quickadmin.date_format'), $input)->format('Y-m-d');
        }else{
            $this->attributes['monthduedate'] = '';
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getMonthduedateAttribute($input)
    {
        if($input != '0000-00-00') {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('quickadmin.date_format'));
        }else{
            return '';
        }
    }

/**
     * Set attribute to date format
     * @param $input
     */
    public function setFirstpaymentDateAttribute($input)
    {
        if($input != '') {
            $this->attributes['FirstpaymentDate'] = Carbon::createFromFormat(config('quickadmin.date_format'), $input)->format('Y-m-d');
        }else{
            $this->attributes['FirstpaymentDate'] = '';
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getFirstpaymentDateAttribute($input)
    {
        if($input != '0000-00-00') {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('quickadmin.date_format'));
        }else{
            return '';
        }
    }


    
}