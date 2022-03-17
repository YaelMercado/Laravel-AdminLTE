<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Courses extends Model
{
	protected $fillable = [
        'codigo', 'nombre', 'tipo_course'
    ];
}