<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    
    protected $fillable = [
        'client_id',
        'document',
        'status'
    ];
}