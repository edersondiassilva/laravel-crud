<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'resident_id',
        'block_id',
        'fraction',
        'number'
    ];    

    /**
     * Get the resident that owns the apartment.
     */
     public function resident()
     {
        return $this->belongsTo('App\Resident');
     }    

     /**
      * Get the block that owns the apartment.
      */
      public function block()
      {
         return $this->belongsTo('App\Block');
      }
}
