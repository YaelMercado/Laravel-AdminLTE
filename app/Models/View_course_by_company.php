<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class View_course_by_company extends Model
{
    protected $table = "view_course_by_company";

	protected $fillable = [
        'empresa_id', 'universidad_id'
    ];
}