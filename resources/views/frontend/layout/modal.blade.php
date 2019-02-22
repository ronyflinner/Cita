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