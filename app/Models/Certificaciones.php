<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Certificaciones extends Model
{
    protected $table = "certificaciones";

	protected $fillable = [
        'name', 'descripcion', 'fecha_incio', 'fecha_fin', 'active'
    ];
}