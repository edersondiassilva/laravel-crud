<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone'
    ];
    
    /**
     * Get the documents for the client.
     */
    public function documents()
    {
        return $this->hasMany('App\Document');
    }
}
