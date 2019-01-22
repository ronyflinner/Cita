<?php

namespace App\Model\Directorio;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model {
	protected $table = 'contactos';

	protected $fillable = [
		'id', 'paciente_id', 'slug', 'mensaje', 'tipo', 'status',
	];
}
