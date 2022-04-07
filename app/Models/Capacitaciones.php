<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Capacitaciones extends Model
{
    protected $table = "capacitaciones";

	protected $fillable = [
        'name', 'descripcion', 'fecha_incio', 'fecha_fin', 'active'
    ];
}