<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Doctor_Servicio extends Model {
	protected $table = 'doctor__servicios';

	protected $fillable = [
		'id', 'servicio_id', 'usuario_id', 'status', 'slug',
	];

	public function servicio_link() {
		return $this->belongsTo('App\Model\Servicio', 'servicio_id');
	}
	public function usuario_link() {
		return $this->belongsTo('App\User', 'usuario_id');
	}

}
