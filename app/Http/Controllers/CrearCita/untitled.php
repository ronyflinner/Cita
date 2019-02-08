<?php
	/*Codigo Original*/

	foreach ($rango_fecha as $key => $value) {

				/*Consultar fechas del rango para buscar el ID*/
				$query_fecha = DB::table('fechas')->where('f_fecha', $value)->get();

				if ($query_fecha->count() > 0) {
					/*Crear Arreglo del Data picker*/
					$fecha_disponible = Disponibilidad::where('lugar_id', $lugar_id)->where('fecha_id', $query_fecha[0]->id)->where('cantPaciente', '!=', 0)->where('status', 1)->get();

					if ($fecha_disponible->count() == 0) {
						$contenedor_fecha[$r] = $value;
					}
				} else {
					$contenedor_fecha[$r] = $value;
				}

				$r++;

			}





foreach ($doctores as $key => $value) {
			return $doctArray = Disponibilidad::where('lugar_id', $lugar_id)
				->where('cantPaciente', '!=', 0)
				->where('status', 1)

				->where('doctor_id', $value->id)

				->whereHas('doctor_servicio_link', function ($query) use ($servicio) {
					$query->where('servicio_id', $servicio);
				})
				->whereHas('fecha_link', function ($query) use ($rango_fecha) {
					$query->whereIn('f_fecha', [array_first($rango_fecha), last($rango_fecha)]);
				})

				->get();

			$fecha = $doctArray[0]->fecha_link->f_fecha;

		}




		Limia pendiente hora

		foreach (Hora::all() as $value) {

			$fecha_disponible = Disponibilidad::where('lugar_id', $lugar_id)
				->where('fecha_id', 23)
				->where('cantPaciente', '!=', 0)
				->where('status', 1)
				->where('hora_id', $value->id)

				->whereHas('doctor_servicio_link', function ($query) use ($servicio) {
					$query->where('servicio_id', $servicio);
				})->with('hora_link')

				->get();

			if ($fecha_disponible->count() > 0) {
				return $fecha_disponible[0]->hora_link->r_hora;

			}

		}



		/**Viejo testeo*/
		$r = 0;
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
		$dtEND = Carbon::create(2019, 03, 20, 0, 0, 0, 'America/Lima');

		/*Obtener Rango de fecha*/
		$rango_fecha = self::generateDateRange($dtINI, $dtEND);

		/*Obteniendo Los Doctores del Servicios*/
		$doctoresArray = array();
		$fecha = array();

		$r = 0;

		$fecha_buscar = '2019-01-31';
		$lugar = 1;
		$servicio = 1;
		$horasOrdenadas = array();
		foreach (Hora::all() as $value) {

			$fecha_disponible = Disponibilidad::where('lugar_id', $lugar_id)
			//->where('fecha_id', 23)
				->where('cantPaciente', '!=', 0)
				->where('status', 1)
				->where('hora_id', $value->id)
				->whereHas('doctor_servicio_link', function ($query) use ($servicio) {
					$query->where('servicio_id', $servicio)->where('status', 1);
				})->whereHas('fecha_link', function ($query) use ($fecha_buscar) {
				$query->where('f_fecha', $fecha_buscar);
			})->get(); //->pluck('hora_link.r_hora', 'hora_id')

			if ($fecha_disponible->count() > 0) {

				$horasOrdenadas[$fecha_disponible[0]->hora_id] = $fecha_disponible[0]->hora_link->r_hora;
				//return $fecha_disponible[0]->hora_link->r_hora;
			}
		}

		return $horasOrdenadas; 



<!-- Incluye Culqi Checkout en tu sitio web-->
<script src="https://checkout.culqi.com/js/v3"></script>

<script>

    // Configura tu llave pública
      Culqi.publicKey = 'pk_test_gj4UppEa7dS8f5By';
    // Configura tu Culqi Checkout
      Culqi.settings({
          title: 'Culqi Store',
          currency: 'PEN',
          description: 'Polo Culqi lover',
          amount: 3500,
          order:"ord_live_0CjjdWhFpEAZlxlz"
      });
      // Usa la funcion Culqi.open() en el evento que desees
      $('#buyButton').on('click', function(e) {
          // Abre el formulario con las opciones de Culqi.settings
          Culqi.open();

          e.preventDefault();
      });

</script>
<script type="text/javascript">

      function culqi() {

          if (Culqi.token) { // ¡Objeto Token creado exitosamente!
              var token = Culqi.token.id;
              console.log('Se ha creado un token:' + token);
              // Aqui enviar token Id a servidor para crear cargo..

                 tokenLaravel=$("#_token").val();
                 dataCompra={tokenCukqui:token,compra:'compra'};
                 rutaPago=$("#_ajaxPago").val();

                 $.ajax({
                        type: 'POST',
                        url: rutaPago,
                        data: dataCompra,
                       // dataType: 'JSON',
                       /* async : true,*/
                        headers:{
                          'X-CSRF-TOKEN': tokenLaravel,
                          'Content-Type':'application/json'
                        },
                   })
                   .done(( data, textStatus, jqXHR)=> {
                         console.log(data);
                         Culqi.close();
                   })
                   .fail(( data, textStatus, jqXHR)=> {
                     //console.log(data);
                   })
                   .always(function() {
                        console.log("complete");
                  });

          }
          else if (Culqi.order) {
              console.log(Culqi.order)

              console.log('Se ha elegido el metodo de pago en efectivo');

               /* Aqui enviar al servidor el order Id y asociarlo al detalle de tu venta.
                  Además, tu venta en tu comercio debe quedar estado pendiente.
                */
          }
          else { // ¡Hubo algún problema!
              // Mostramos JSON de objeto error en consola
              console.log(Culqi.error);
            //  console.log(Culqi.error.user_message);


                Culqi.close();
          }
  };
</script>