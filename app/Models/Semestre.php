<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Semestre extends Model
{
    protected $table = "semestre";

	protected $fillable = [
        'name', 'descripcion', 'id_carrers'
    ];
}