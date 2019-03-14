<?php

namespace App\Model;

use App\Model\Disponibilidad;
use Illuminate\Database\Eloquent\Model;

class Fecha extends Model {
	protected $table = 'fechas';

	protected $fillable = [
		'id', 'f_fecha', 'slug',
	];

	public function disponibilidad_link() {
		return $this->hasMany(Disponibilidad::class, 'fecha_id', 'id');
	}

}
