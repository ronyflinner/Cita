<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Hora extends Model {
	protected $table = 'horas';
	protected $fillable = [
		'id', 'r_hora',
	];
}
