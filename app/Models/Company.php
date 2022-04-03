<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Company extends Model
{
    protected $table = "companys";

	protected $fillable = [
        'name', 'address', 'phone', 'url_site', 'text_id', 'id_fiscal', 'name_contact', 'puesto', 'email', 'phone_contact' ,'no_alumnos', 'no_profesores', 'pais', 'zona_horaria'
    ];
}