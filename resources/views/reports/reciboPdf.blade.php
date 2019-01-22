   <link rel="stylesheet" type="text/css" href="{{url('health/styles/bootstrap4/bootstrap.min.css')}}">


 <style type="text/css">
    .text-danger strong {
        color: #9f181c;
    }
    .receipt-main {
      background: #ffffff none repeat scroll 0 0;
      border-bottom: 12px solid #333333;
      border-top: 12px solid #9f181c;
      margin-top: 50px;
      margin-bottom: 50px;
      padding: 40px 30px !important;
      position: relative;
      box-shadow: 0 1px 21px #acacac;
      color: #333333;
      font-family: open sans;
    }
    .receipt-main p {
      color: #333333;
      font-family: open sans;
      line-height: 1.42857;
    }
    .receipt-footer h1 {
      font-size: 15px;
      font-weight: 400 !important;
      margin: 0 !important;
    }
    .receipt-main::after {
      background: #414143 none repeat scroll 0 0;
      content: "";
      height: 5px;
      left: 0;
      position: absolute;
      right: 0;
      top: -13px;
    }
    .receipt-main thead {
      background: #414143 none repeat scroll 0 0;
    }
    .receipt-main thead th {
      color:#fff;
    }
    .receipt-right h5 {
      font-size: 16px;
      font-weight: bold;
      margin: 0 0 7px 0;
    }
    .receipt-right p {
      font-size: 12px;
      margin: 0px;
    }
    .receipt-right p i {
      text-align: center;
      width: 18px;
    }
    .receipt-main td {
      padding: 9px 20px !important;
    }
    .receipt-main th {
      padding: 13px 20px !important;
    }
    .receipt-main td {
      font-size: 13px;
      font-weight: initial !important;
    }
    .receipt-main td p:last-child {
      margin: 0;
      padding: 0;
    }
    .receipt-main td h2 {
      font-size: 20px;
      font-weight: 900;
      margin: 0;
      text-transform: uppercase;
    }
    .receipt-header-mid .receipt-left h1 {
      font-weight: 100;
      margin: 34px 0 0;
      text-align: right;
      text-transform: uppercase;
    }
    .receipt-header-mid {
      margin: 24px 0;
      overflow: hidden;
    }

    #container {
      background-color: #dcdcdc;
    }
</style>

 <img src="{{ url('health/images/lcc.png') }}" alt="" width="140px" height="60px">

 <div class="container">
  <div class="row">

        <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">


      	<div class="row">

	          <div class="col-xs-12 col-sm-12 col-md-12 ">
					<div class="text-center" style="margin-left: 40px">
	      				<h4>Comprobante de Cita</h4>
	      			</div>
	      			<br><br>
		            <div class="receipt-right">

			              <h5>Paciente: {{ $cita[0]->paciente_link->name }}<small>  |   Hora de Atención : {{ $cita[0]->disponibilidad_link->hora_link->r_hora }}</small></h5>
			              <p><b>DNI :</b> 76188250</p>
			              <p><b>Celular :</b> +91 12345-6789</p>
			              <p><b>Email :</b> {{ $cita[0]->paciente_link->email }}</p>
			              <p><b>Direccion :</b> {{ $cita[0]->disponibilidad_link->lugar_link->nombre .", ". $cita[0]->disponibilidad_link->lugar_link->direccion }}</p>
		            </div>
	          </div>
        </div>
			<br>
			<br>
        <div>
            <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Descripción</th>
                            <th>Pago</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-md-9">Liga contra el cancer</td>
                            <td class="col-md-3"><i class="fa fa-inr"></i>s/. 25,000</td>
                        </tr>
                        <tr>
                            <td class="text-right"><h2><strong>Total: </strong></h2></td>
                            <td class="text-left text-danger"><h2><strong><i class="fa fa-inr"></i>s/. 25,000 </strong></h2></td>
                        </tr>
                    </tbody>
                </table>
        </div>
     	<div class="row">
		          <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		             <p><b>Fecha :</b> 15 de Agosto de 2019</p>
		          </div>
        </div>
       </div>
  </div>
</div>