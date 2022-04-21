<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Pagos extends Model
{
    protected $table = "pagos";

	protected $fillable = [
        'user_id', 'pay_id', 'description','mount', 'pais', 'concept'
    ];
}