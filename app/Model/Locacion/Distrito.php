<?php

namespace App\Model\Locacion;

use App\Model\Locacion\Provincia;
use Illuminate\Database\Eloquent\Model;

class Distrito extends Model {
	protected $table = 'distritos';
	protected $fillable = [
		'nombre', 'provincia_id',
	];

	public function provincia_link() {
		return $this->belongsTo(Provincia::class, 'provincia_id');
	}
}
