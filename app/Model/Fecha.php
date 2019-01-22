<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Fecha extends Model {
	protected $table = 'fechas';

	protected $fillable = [
		'id', 'f_fecha', 'slug',
	];
}
