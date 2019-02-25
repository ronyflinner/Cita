<!-- Modal -->
  <div class="modal fade text-xs-left " id="pagarCitaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog " cd  role="document">
    <div class="modal-content ">
      <div class="modal-header " style="background-color:#33bdc2 ">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <h4 class="modal-title" id="myModalLabel1" style="color:#fff">Basic Modal</h4>

      </div>
      <div class="modal-body">

        <form class='form' id='form' method='POST' name='form' action='https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu/' accept-charset='UTF-8' >

           <input name='merchantId' id="merchantId"   type='hidden'  value=''   >
                <input name='accountId'   id="accountId"  type='hidden'  value='' >
                <input name='description'  id="description" type='hidden'  value=''  >
                <input name='referenceCode'  id='referenceCode'  type='hidden' value='' >
                <input name='amount'       id='amount' type='hidden'  value=''   >
                <input name='tax'         id="tax"  type='hidden'  value='0'  >
                <input name='taxReturnBase' id="taxReturnBase" type='hidden'  value='0' >
                <input name='currency' id="currency"     type='hidden'  value='PEN' >
                <input name='signature'    id="signature" type='hidden'  value=''  >
                <input name='buyerEmail'  id="buyeEmail"  type='hidden'  value='' >
                <input name='test'          type='hidden'  value='1' >
                <input name='responseUrl'    type='hidden'  value='{{ url('/admin/usuario/response') }}' >
                <input name='confirmationUrl' type='hidden' value='https://www.ligacancer.org.pe/confirmacionPayu.php'>

        <div id="idmensaje"></div>
      <div id="idcontainer">

      </div>
      </div>
      <div class="modal-footer ">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-danger">Pagar Cita</button>

            {!!Form::close()!!}
      </div>
    </div>
    </div>
  </div>

  <!-- end modal -->