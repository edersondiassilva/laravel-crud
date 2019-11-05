<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Condominium extends Model
{    
  /**
     * The table associated with the model.
     *
     * @var string
     */
     protected $table = 'condos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'name',
        'address'
    ];
    
    /**
     * Get the blocks for the condominium.
     */
    public function blocks()
    {
        return $this->hasMany('App\Block');
    }
}
