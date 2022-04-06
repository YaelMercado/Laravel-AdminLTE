<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Instructores extends Model
{
    protected $table = "Instructores";

	protected $fillable = [
        'name', 'semblaza', 'user_id', 'imagen'
    ];
}