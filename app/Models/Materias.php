<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Materias extends Model
{
    protected $table = "materias";

	protected $fillable = [
        'name', 'descripcion', 'id_semestre'
    ];
}