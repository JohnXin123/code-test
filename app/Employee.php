<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 
        'last_name',
        'department', 
        'phone_no', 
        'staff_id', 
        'address',
        'company_id',
        'user_id',
    ];

    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public static function boot()
    {
        parent::boot();    
    
        static::deleting(function($employee)
        {
            $employee->user()->delete();
        });
        
    } 
}
