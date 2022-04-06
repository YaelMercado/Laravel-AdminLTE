<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Pais extends Model
{
    protected $table = "DIC_Pais";

	protected $fillable = [
        'ISONUM', 'ISO2', 'ISO3', 'CODIGO', 'NOMBRE'
    ];
}