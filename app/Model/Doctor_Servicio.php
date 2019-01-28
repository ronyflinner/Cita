<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Doctor_Servicio extends Model {
	protected $table = 'doctor_servicios';

	protected $fillable = [
		'id', 'idservicio', 'idusuario', 'status', 'slug',
	];

	public function servicio_link() {
		return $this->belongsTo(Servicio::class, 'idservicio');
	}
}
