<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//Protejo los campos rellenables del formulario
class Student extends Model
{
        protected $fillable = [
        'name',
        'subject',
        'note',
    ];
}
