<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;

use Carbon\Carbon; 

use Illuminate\Database\Eloquent\SoftDeletes;

class SecurityDeposit extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'securitydeposit';
    
    protected $fillable = [
          'property_id',
          'security_id',
          'amount',
          'dueOn'
    ];
    

    public static function boot()
    {
        parent::boot();

        SecurityDeposit::observe(new UserActionsObserver);
    }
    
    public function property()
    {
        return $this->hasOne('App\Property', 'id', 'property_id');
    }


    public function security()
    {
        return $this->hasOne('App\Security', 'id', 'security_id');
    }


    
    
    /**
     * Set attribute to datetime format
     * @param $input
     */
    public function setDueOnAttribute($input)
    {
        if($input != '') {
            $this->attributes['dueOn'] = Carbon::createFromFormat(config('quickadmin.date_format') . ' ' . config('quickadmin.time_format'), $input)->format('Y-m-d H:i:s');
        }else{
            $this->attributes['dueOn'] = '';
        }
    }

    /**
     * Get attribute from datetime format
     * @param $input
     *
     * @return string
     */
    public function getDueOnAttribute($input)
    {
        if($input != '0000-00-00') {
            return Carbon::createFromFormat('Y-m-d H:i:s', $input)->format(config('quickadmin.date_format') . ' ' .config('quickadmin.time_format'));
        }else{
            return '';
        }
    }


}