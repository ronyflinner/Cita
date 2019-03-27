<?php

namespace App\Http\Controllers\CrearCita;

use App\Http\Controllers\Controller;
use App\Http\Controllers\traitsGeneral\principal;
use App\Mail\ConfirmacionCita;
use App\Model\Cita;
use App\Model\Disponibilidad;
use App\Model\Fecha;
use App\Model\Hora;
use App\Model\Locacion\Lugar;
use App\Model\Servicio;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Jenssegers\Date\Date;

class CrearCitaController extends Controller {
	use principal;
	private $maxTotal;
	private $max;

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		/*	$years = Date::now()->format('Y');

			foreach (self::cargarFecha($years, 1) as $key => $value) {
				# code...
				Fecha::create(['f_fecha' => $value, 'slug' => str_random(120)]);

			}

		*/

		///return new ConfirmacionCita(Cita::where('paciente_id', 10)->get());

		//return new RecordarCita;

		#Mail::to($userDta[0]->paciente_link->email)->queue(new RecordarCita($userDta));

		#$userDta = Cita::where('referenceCode', '02412321771')->get();
		#return new ConfirmacionCita($userDta);
		#
		#
		#

		return view('cita.crearcita', ['lugar' => array_add(Lugar::all()->pluck('nombre', 'id'), '', 'Selecionar')]);
	}
	/*Crear Cita*/
	public function ajaxSelecionarBuscar(Request $request) {
		$disponibilidad = Disponibilidad::where('lugar_id', $request->lugar)->where('status', 1)->get();

		$seleccionar = array();
		foreach ($disponibilidad as $key => $value) {
			$seleccionar[$value->doctor_servicio_link->servicio_id] = $value->doctor_servicio_link->servicio_link->nombre;
		}
		if (count($seleccionar) > 0) {
			$oh = 1;
		} else {
			$oh = 0;
		}
		//$validar = (count($seleccionar) > 0) ? $oh = 1 : $oh = 0;

		return response()->json(['validar' => $oh, 'selecionar' => $seleccionar, 'switch' => 1]);
	}

	public function ajaxCrearCitaFecha(Request $request, $lugar_id = null, $servicio = null) {
		if ($request->ajax()) {

			$contenedor_fecha = array();
			/*Definiendo variables*/
			$dateA = "2019-01-15";
			$bandera = 0;
			$r = 0;
			/**/
			$fecha_final = Fecha::latest('f_fecha')->first();
			/*COnvirtiendo fechas de Base de datos  a una instancia de carbon*/
			$fecha_final_carbon_y = Date::createFromFormat('Y-m-d', $fecha_final->f_fecha)->format('Y');
			$fecha_final_carbon_m = Date::createFromFormat('Y-m-d', $fecha_final->f_fecha)->format('m');
			$fecha_final_carbon_d = Date::createFromFormat('Y-m-d', $fecha_final->f_fecha)->format('d');

			/*Fragmentando la fechas */
			$fecha_inicial_d = Date::now()->format('d');
			$fecha_inicial_m = Date::now()->format('m');
			$fecha_inicial_y = Date::now()->format('Y');

			/*Recorriendo las fechas*/
			$dtINI = Carbon::create($fecha_inicial_y, $fecha_inicial_m, $fecha_inicial_d, 0, 0, 0, 'America/Lima');
			$dtEND = Carbon::create($fecha_final_carbon_y, $fecha_final_carbon_m, $fecha_final_carbon_d, 0, 0, 0, 'America/Lima');

			/*Obtener Rango de fecha*/
			$rango_fecha = self::generateDateRange($dtINI, $dtEND);

			/*Recorriendo el arreglo de rango de fechas*/
			foreach ($rango_fecha as $value) {
				/*Consultar fechas del rango para buscar el ID*/
				$query_fecha = DB::table('fechas')->where('f_fecha', $value)->get();

				if ($query_fecha->count() > 0) {
					/*Buscar disponibilidad de los doctorres a con ese servicio*/
					$fecha_disponible = Disponibilidad::where('lugar_id', $lugar_id)
						->where('fecha_id', $query_fecha[0]->id)
						->where('cantPaciente', '!=', 0)
						->where('status', 1)
					/*Buscar doctores que son parte del servicio*/
						->whereHas('doctor_servicio_link', function ($query) use ($servicio) {
							$query->where('servicio_id', $servicio);
						})->with('hora_link');

					if ($fecha_disponible->count() == 0) {
						$contenedor_fecha[$r] = $value;
						$cal[] = $value;
					}

				} else {
					$contenedor_fecha[$r] = $value;
				}

				$r++;

			}

			/*Verificanddo si se dispone cita*/
			if (count($rango_fecha) == count($contenedor_fecha)) {
				$direccion = "<h3 class='alert-danger'> No se han aperturado Citas para la Sede selecionada. </h3>";
				$bandera = 0;

			} else {
				$direccion_query = Lugar::find($lugar_id);

				$direccion = "<label for='sel1'>Dirección:</label><br>";
				//$direccion .= "<label>" . $direccion_query->nombre . $direccion_query->direccion . "</label>";
				$direccion .= "<p>" . $direccion_query->nombre . " - " . $direccion_query->direccion . "<p>";
				$bandera = 1;
			}

			return response()->json(["contenedor_fecha" => $contenedor_fecha, 'contenedor_fechaFinal' => $fecha_final->f_fecha, 'contenedor_lugar' => $direccion, 'verificacion' => $direccion, 'bandera' => $bandera, 'testeo' => $lugar_id]);

		}
	}

	public function ajaxBuscarHora(Request $request) {

		if ($request->ajax()) {
			$Disponibilidad = array();
			$fecha_buscar = $request->data;
			$lugar = $request->lugar;
			$servicio = $request->serv;

			/*$Disponibilidad = Disponibilidad::orderBy('hora_id', 'DESC')->where('lugar_id', $lugar)->where('status', 1)
				->whereHas('fecha_link', function ($query) use ($fecha_buscar) {
					$query->where('f_fecha', $fecha_buscar);
				})->with('hora_link')
				->get()->pluck('hora_link.r_hora', 'id');*/

			foreach (Hora::all() as $value) {

				$fecha_disponible = Disponibilidad::where('lugar_id', $lugar)
				//->where('fecha_id', 23)
					->where('cantPaciente', '!=', 0)
					->where('status', 1)
					->where('hora_id', $value->id)
					->whereHas('doctor_servicio_link', function ($query) use ($servicio) {
						$query->where('servicio_id', $servicio)
							->where('status', 1)
						;
					})->whereHas('fecha_link', function ($query) use ($fecha_buscar) {
					$query->where('f_fecha', $fecha_buscar);
				})->get(); //->pluck('hora_link.r_hora', 'hora_id')

				if ($fecha_disponible->count() > 0) {
					/*Haciendo el arreglo para el select id hora disponbilidad y nombre de hora*/
					$disponibilidad = explode('-', $fecha_disponible[0]->hora_link->r_hora);

					$Disponibilidad[$fecha_disponible[0]->hora_id] = $disponibilidad[0];
					//return $fecha_disponible[0]->hora_link->r_hora;
				}
			}

			return response()->json(['data' => $Disponibilidad, 'switch' => 3]);
		}
	}

	public function response(request $request) {

		$pagoProcesado = array();
		$request->processingDate; //fecha

		$fecha = $request->processingDate . ' ' . Date::now()->format('h:i:s');
		$pagoProcesado = Arr::add($pagoProcesado, 'processingDate', $fecha);

		$request->buyerEmail;
		$pagoProcesado = Arr::add($pagoProcesado, 'buyerEmail', $request->buyerEmail);
		$request->transactionId; //Transacion ID
		$pagoProcesado = Arr::add($pagoProcesado, 'transactionId', $request->transactionId);
		$request->reference_pol; //referencia de pago
		$pagoProcesado = Arr::add($pagoProcesado, 'reference_pol', $request->reference_pol);

		$request->message; // Mensaje de aprobacion
		$pagoProcesado = Arr::add($pagoProcesado, 'message', $request->message);

		/*TIPO DE PAGO*/
		$request->polPaymentMethod; //ID DE BANK
		$pagoProcesado = Arr::add($pagoProcesado, 'polPaymentMethod', $request->polPaymentMethod);

		$request->lapPaymentMethod; // TIPO VISA
		$pagoProcesado = Arr::add($pagoProcesado, 'lapPaymentMethod', $request->lapPaymentMethod);

		$request->lapPaymentMethodType; // TIPO DE MEDIO
		$pagoProcesado = Arr::add($pagoProcesado, 'lapPaymentMethodType', $request->lapPaymentMethodType);

		/*Estado transacion*/
		$request->transactionState;
		$pagoProcesado = Arr::add($pagoProcesado, 'transactionState', $request->transactionState);

		$request->lapTransactionState;
		$pagoProcesado = Arr::add($pagoProcesado, 'lapTransactionState', $request->lapTransactionState);

		/*Diferenciar Estado*/
		if ($request->message == 'APPROVED') {
			/*enviar mensaje*/
			$userDta = Cita::where('referenceCode', $request->referenceCode)->get();

			Mail::to($userDta[0]->paciente_link->email)->queue(new ConfirmacionCita($userDta));

			$pagoProcesado = Arr::add($pagoProcesado, 'status_pago', 1);
		} else if ($request->message == 'REJECTED') {
			$pagoProcesado = Arr::add($pagoProcesado, 'status_pago', 2);
		} else if ($request->message == 'PENDING') {
			$pagoProcesado = Arr::add($pagoProcesado, 'status_pago', 3);
		}

		$request->referenceCode; // Codigo de referencia CREADO por el Sistema

		//return $request->all();
		Cita::where('referenceCode', $request->referenceCode)->where('status', 1)
			->update($pagoProcesado);

		Log::info('Respuesta en estado' . $request->message);

		return view('cita.citaprogramada');

	}

	/*Respuesta para payu de Asistente*/
	public function responseAsistentePayu(request $request) {

		$pagoProcesado = array();
		$request->processingDate; //fecha

		$fecha = $request->processingDate . ' ' . Date::now()->format('h:i:s');
		$pagoProcesado = Arr::add($pagoProcesado, 'processingDate', $fecha);

		$request->buyerEmail;
		$pagoProcesado = Arr::add($pagoProcesado, 'buyerEmail', $request->buyerEmail);
		$request->transactionId; //Transacion ID
		$pagoProcesado = Arr::add($pagoProcesado, 'transactionId', $request->transactionId);
		$request->reference_pol; //referencia de pago
		$pagoProcesado = Arr::add($pagoProcesado, 'reference_pol', $request->reference_pol);

		$request->message; // Mensaje de aprobacion
		$pagoProcesado = Arr::add($pagoProcesado, 'message', $request->message);

		/*TIPO DE PAGO*/
		$request->polPaymentMethod; //ID DE BANK
		$pagoProcesado = Arr::add($pagoProcesado, 'polPaymentMethod', $request->polPaymentMethod);

		$request->lapPaymentMethod; // TIPO VISA
		$pagoProcesado = Arr::add($pagoProcesado, 'lapPaymentMethod', $request->lapPaymentMethod);

		$request->lapPaymentMethodType; // TIPO DE MEDIO
		$pagoProcesado = Arr::add($pagoProcesado, 'lapPaymentMethodType', $request->lapPaymentMethodType);

		/*Estado transacion*/
		$request->transactionState;
		$pagoProcesado = Arr::add($pagoProcesado, 'transactionState', $request->transactionState);

		$request->lapTransactionState;
		$pagoProcesado = Arr::add($pagoProcesado, 'lapTransactionState', $request->lapTransactionState);

		/*Diferenciar Estado*/
		if ($request->message == 'APPROVED') {
			$pagoProcesado = Arr::add($pagoProcesado, 'status_pago', 1);

			$userDta = Cita::where('referenceCode', $request->referenceCode)->get();

			Mail::to($userDta[0]->paciente_link->email)->queue(new ConfirmacionCita($userDta));

		} else if ($request->message == 'REJECTED') {
			$pagoProcesado = Arr::add($pagoProcesado, 'status_pago', 2);
		} else if ($request->message == 'PENDING') {
			$pagoProcesado = Arr::add($pagoProcesado, 'status_pago', 3);
		}

		$request->referenceCode; // Codigo de referencia CREADO por el Sistema

		//return $request->all();
		Cita::where('referenceCode', $request->referenceCode)->where('status', 1)
			->update($pagoProcesado);

		Log::info('Respuesta de creación de usuario en asistente y su estado es: ' . $request->message);

		/*Regresar vista*/
		$tipoDocumento = ['' => 'Selecionar', '1' => 'DNI', '2' => 'Pasaporte', '3' => 'Carnet de Extranjeria'];

		return view('asistente.CrearCitaManual', ['tipoDocumento' => $tipoDocumento, 'mensaje' => 1]);

	}

	public function confirmation(Request $request) {
		Log::info($request->all());
		return $Value = $request->all();

	}
	public function paymentPayUConfirm($confirmation) {
		Log::info($confirmation);
		$pagoProcesado = array();

		if ($confirmation['response_message_pol'] == 'APPROVED') {
			$pagoProcesado = Arr::add($pagoProcesado, 'status_pago', 1);

			/*Nota: Pendiente de esta linea en caso de fallo.*/

			$userDta = Cita::where('referenceCode', $confirmation['reference_sale'])->get();

			Mail::to($userDta[0]->paciente_link->email)->queue(new ConfirmacionCita($userDta));

		} else if ($confirmation['response_message_pol'] == 'REJECTED') {
			$pagoProcesado = Arr::add($pagoProcesado, 'status_pago', 2);
		} else if ($confirmation['response_message_pol'] == 'PENDING') {
			$pagoProcesado = Arr::add($pagoProcesado, 'status_pago', 3);
		}

		$pagoProcesado = Arr::add($pagoProcesado, 'buyerEmail', $confirmation['email_buyer']);

		/*ESTADO DE TRANSACION*/
		$pagoProcesado = Arr::add($pagoProcesado, 'message', $confirmation['response_message_pol']);
		$pagoProcesado = Arr::add($pagoProcesado, 'lapTransactionState', $confirmation['response_message_pol']);
		$pagoProcesado = Arr::add($pagoProcesado, 'transactionState', $confirmation['state_pol']);

		$pagoProcesado = Arr::add($pagoProcesado, 'transactionId', $confirmation['transaction_id']);
		/*ID BANCO*/
		$pagoProcesado = Arr::add($pagoProcesado, 'polPaymentMethod', $confirmation['bank_id']);

		$pagoProcesado = Arr::add($pagoProcesado, 'processingDate', $confirmation['transaction_date']);

		$pagoProcesado = Arr::add($pagoProcesado, 'lapPaymentMethodType', $confirmation['payment_method_name']);

		$pagoProcesado = Arr::add($pagoProcesado, 'reference_pol', $confirmation['reference_pol']);

		/*	$pagoProcesado = Arr::add($pagoProcesado, 'reference_sale', $confirmation['reference_sale']);*/
		//Log::info($pagoProcesado);

		Cita::where('referenceCode', $confirmation['reference_sale'])->where('status', 1)
			->update($pagoProcesado);

		Log::info('Confirmacion en estado' . $confirmation['response_message_pol']);

	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

		$mensaje = 0;
		$disponbilidad = '';

		$fecha_buscar = $request->date;
		$hora = $request->hora;
		$lugar = $request->lugar;
		$servicio = $request->servicio;

		/*Validando  si el paciente tiene una  cita asignada*/
		$disponbilidadCita = Cita::where('paciente_id', Auth::id())->where('status', 1)->get();

		if ($disponbilidadCita->count() > 0) {
			$mensaje = 2; // error de existencia de cita activa
			$disponbilidad = $disponbilidadCita;
		} else {
			/*Buscar la hora disponbile selecionada*/
			$busqueda_disponbilidad = Disponibilidad::where('hora_id', $hora)
				->where('lugar_id', $lugar)
				->whereHas('doctor_servicio_link', function ($query) use ($servicio) {
					$query->where('servicio_id', $servicio)
						->where('status', 1);
				})->whereHas('fecha_link', function ($query) use ($fecha_buscar) {
				$query->where('f_fecha', $fecha_buscar);
			})->get();

			$r = 0;
			foreach ($busqueda_disponbilidad as $value) {
				$cantidad = 0;

				/*Decrementar la cantidad de cita disponible*/
				if ($value->cantPaciente > 0) {
					$cantidad = $value->cantPaciente - 1;
					Disponibilidad::where('id', $value->id)
						->update(['cantPaciente' => $cantidad]);

					/*Validar usuario si es usuario logueado o no logueado*/
					if ($request->userValid == 1) {
						$userID = $request->userId;
					} else {
						$userID = Auth::id();
					}

					/*asignar cita*/
					$cita = Cita::create([
						'disponibilidad_id' => $value->id,
						'paciente_id' => $userID,
						'status_asistio' => 1,
						'idReprogramada' => 1,
						'referenceCode' => $request->referenceCode,
						'status_pago' => 3, //1- Aprobado  2- Rechazad 3- Pendiente
						'status' => 1, //cita activa
						'slug' => str_random(120)]);
					$mensaje = 1; // Su cita fue correctamente creada */
					break; // detener proceso
				}
				$r++;
			}

		}

		return response()->json(["dispo" => $disponbilidad, 'yeah' => $mensaje, 'switch' => 2]);
	}

	public function ajaxPayuFormulario(Request $request) {
		if ($request->ajax()) {

			/*Buscando precio del servicio*/
			$servicio = Servicio::find($request->servicio);

			/*Formulario de pago*/
			$amount = $servicio->costo;

			//validar - Vista Crear Cita Asistente y Vista Crear cita paciente
			if ($request->uservalid == 1) {
				$userID = $request->userid; //asistente

				$userSearh = User::find($userID);
				$dni = $userSearh->dni;
			} else {
				$userID = Auth::id(); //paciente

				$dni = Auth::user()->dni;
			}

			/*
				 NUEVO REFERENCE CODE

			*/

			$this->max = Cita::max('id');
			$this->maxTotal = $this->max + 1;

			$referenceCODE = $dni . $this->maxTotal;

			//str_random(2)
			//$referenceCODE = "0" . $userID . Date::now()->format('his') . rand(1, 100);

			$valores = self::credencialesPAyu($amount, $referenceCODE);
			/*000+DNI+ID CITA*/

			$data = [
				'referenceCode' => $valores[0],
				'amount' => $valores[1],
				'signature' => $valores[2],
				'currency' => $valores[3],
				'description' => $valores[4],
				'accountId' => $valores[5],
				'merchantId' => $valores[6],
				'tax' => $valores[7],
			];

			return response()->json($data);

		}

	}

	// CREAR CITA MANUAL

	public function crearmanual_index() {

		$tipoDocumento = ['' => 'Selecionar', '1' => 'DNI', '2' => 'Pasaporte', '3' => 'Carnet de Extranjeria'];

		return view('asistente.CrearCitaManual', ['tipoDocumento' => $tipoDocumento, 'mensaje' => 2]);
	}

	public function storemanual_index(Request $request) {
		$user = '';
		$cita = '';
		$lugar = '';
		$validar = 0;
		$lugar = Lugar::all();

		$user = User::where('dni', $request->numero)->where('tipo_documento', $request->tipo)->get();

		//$documento = $request->tipo . '-' . $request->numero;

		if (count($user) > 0) {

			$cita = Cita::where('paciente_id', $user[0]->id)->where('status', 1)->get();

			if (count($cita) > 0) {
				//Pendiente CAmbiar
				$mensaje = 3; // Dispone de una Cita activa actualmente
				$validar = 0;
			} else {
				$mensaje = 1; // Consulta realizada correctamente
				$validar = 1;
			}

		} else {
			$mensaje = 2; // no encontro usuario
		}

		return response()->json(['mensaje' => $mensaje, 'data' => $user, 'validarCita' => $validar, 'lugar' => array_add(Lugar::all()->pluck('nombre', 'id'), '', 'Selecionar')]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}
}
