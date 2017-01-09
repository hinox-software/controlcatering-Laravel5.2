<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zonas extends Model
{
     protected $table = 'zonas';

    protected $fillable = [
     
     		'descripcion',
            'dpto',
            
    ];
}
