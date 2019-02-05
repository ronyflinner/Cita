
    <!-- jQuery library -->
<!-- Latest compiled JavaScript -->
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>




<script src="{{ url('medico/js/jquery.min.js') }}"></script>
 <script src="{{ url('medico/js/bootstrap.min.js') }}"></script>
<script src="//cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
  <script src="{{ url('medico/js/jquery.easing.min.js') }}"></script>
  <script src="{{ url('medico/js/wow.min.js') }}"></script>
  <script src="{{ url('medico/js/jquery.scrollTo.js') }}" ></script>
  <script src="{{ url('medico/js/jquery.appear.js') }}"></script>
  <script src="{{ url('medico/s/stellar.js') }}"></script>
  <script src="{{ url('medico/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js') }}"></script>
  <script src="{{ url('medico/js/owl.carousel.min.js') }}"></script>
  <script src="{{ url('medico/js/nivo-lightbox.min.js') }}"></script>
  <script src="{{ url('medico/s/custom.js') }}"></script>


<!-- CK Editor -->
<script src="{{ url('health/plugin/ckeditor/ckeditor.js') }}"></script>


<script src="{{ url('health/js/fullcalendar.min.js') }}"></script>

<script src="{{ url('health/js/jquery.dataTables.min.js') }}"></script>



 <!--Select -->


<!-- datapicker-->
<script src="{{ url('health/js/bootstrap-datepicker.js') }}"></script>

<!-- select 2-->
<script src="{{ url('health/js/select2.min.js') }}"></script>

<!-- Parsley Validator -->
<link rel="stylesheet" type="text/css" href="{{url('health/styles/parsley.css')}}">

<script src="{{ url('health/js/parsley.min.js') }}"></script>

<script src="{{ url('health/js/i18n/es.js') }}"></script>


<!-- toastrs -->
<link rel="stylesheet" type="text/css" href="{{url('health/styles/toastr.min.css')}}">
<script src="{{ url('health/js/toastr.min.js') }}"></script>

<script src="{{ url('health/js/jquery.mask.min.js') }}"></script>


<script src="{{ url('health/js/moment.min.js') }}"></script>

<!-- custom-->
<script src="{{ url('health/js/custom.js') }}"></script>


     {{ Html::style('https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css') }}
       {{ Html::script('https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js') }}



@yield('javascript')