<?php

namespace App\Model\Locacion;

use Illuminate\Database\Eloquent\Model;

class Lugar extends Model {
	protected $table = 'lugars';

	protected $fillable = [
		'id', 'nombre', 'direccion', 'distrito_id', 'numero', 'email', 'numero',
	];
}
