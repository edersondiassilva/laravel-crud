<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'condominium_id',
        'address'
    ];    

    /**
     * Get the condominium that owns the block.
     */
     public function condominium()
     {
        return $this->belongsTo('App\Condominium');
     }
    
    /**
     * Get the expenses for the block.
     */
    public function expenses()
    {
        return $this->hasMany('App\Expense');
    }
}
