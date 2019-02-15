<?php

namespace App\Model;

use App\Model\Disponibilidad;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Cita extends Model {
	protected $table = 'citas';

	protected $fillable = [
		'disponibilidad_id', 'paciente_id', 'status_asistio', 'slug', 'status', 'status_pago', 'referenceCode', 'processingDate', 'buyerEmail', 'transactionId', 'reference_pol', 'lapPaymentMethod', 'lapPaymentMethodType', 'message', 'transactionState', 'lapTransactionState',

	];

	public function disponibilidad_link() {
		return $this->belongsTo(Disponibilidad::class, 'disponibilidad_id');
	}

	public function paciente_link() {
		return $this->belongsTo(User::class, 'paciente_id');
	}

	public function getCreatedAtAttribute($data) {
		return new Date($data);
	}

}
