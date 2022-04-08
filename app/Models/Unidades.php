<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Unidades extends Model
{
    protected $table = "unidades";

	protected $fillable = [
        'codigo','name', 'descripcion', 'agenda', 'fecha_zoom', 'order', 'type', 'id_cert_cap', 'url_zoom', 'id_zoom'
    ];
}