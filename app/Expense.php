<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'block_id',
        'name',
        'value'
    ];

    /**
     * Get the block that owns the expense.
     */
     public function block()
     {
        return $this->belongsTo('App\Block');
     }
}
