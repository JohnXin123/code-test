<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','address'
    ];

    public function employees()
    {
        return $this->hasMany('App\Employee');
    }

    public static function boot()
    {
        parent::boot();    
    
        static::deleting(function($company)
        {
            $company->employees->each(function($employee) {
                $employee->user()->delete();
            });

            $company->employees()->delete();

        });
        
    }  
}
