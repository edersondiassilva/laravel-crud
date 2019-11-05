<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'name',
        'surname'
    ];
    
    /**
     * Get the apartments for the resident.
     */
    public function apartaments()
    {
        return $this->hasMany('App\Apartament');
    }
}
