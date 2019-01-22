<?php

namespace App\Model;

use App\Model\Fecha;
use App\Model\Hora;
use App\Model\Locacion\Lugar;
use Illuminate\Database\Eloquent\Model;

class Disponibilidad extends Model {
	protected $table = 'disponibilidads';

	protected $fillable = [
		'fecha_id', 'lugar_id', 'hora_id', 'cantPaciente', 'slug',
	];

	public function fecha_link() {
		return $this->belongsTo(Fecha::class, 'fecha_id');
	}

	public function hora_link() {
		return $this->belongsTo(Hora::class, 'hora_id');
	}
	public function lugar_link() {
		return $this->belongsTo(Lugar::class, 'lugar_id');
	}
}
