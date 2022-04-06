<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Carrers extends Model
{
    protected $table = "carrers";

	protected $fillable = [
        'name', 'descripcion'
    ];
}