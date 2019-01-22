<?php

namespace App\Model\Locacion;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model {
	protected $table = 'provincias';

	protected $fillable = [
		'id', 'nombre',
	];
}
