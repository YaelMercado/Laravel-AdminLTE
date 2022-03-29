<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Estancias extends Model
{
    protected $table = "table_estancias";

	protected $fillable = [
        'type_estancia', 'name', 'descripcion', 'imagen_portada', 'fecha_inicio', 'fecha_fin', 'pais_destino', 'imagen_pais_destino', 'universidad_destino', 'imagen_universidad_destino', 'archive_politias_reglas', 'archive_agenda', 'imagen_fondo'
    ];
}