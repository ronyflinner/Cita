
    <!-- jQuery library -->
<!-- Latest compiled JavaScript -->
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

{{ Html::script('https://code.jquery.com/jquery-3.3.1.js') }}
{{ Html::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js') }}
{{ Html::script('medico/js/jquery.easing.min.js') }}

{{ Html::script('medico/js/i18n/es.js') }}
{{ Html::script('medico/js/moment.min.js') }}


<!-- Efectos -->
{{ Html::script('medico/js/wow.min.js') }}
{{ Html::script('medico/js/jquery.scrollTo.js') }}
{{ Html::script('medico/js/jquery.appear.js') }}
{{ Html::script('medico/js/stellar.js') }}
<!-- Efectos -->

{{ Html::script('medico/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js') }}
{{ Html::script('medico/js/owl.carousel.min.js') }}
{{ Html::script('medico/js/nivo-lightbox.min.js') }}
{{ Html::script('medico/js/custom.js') }}

<!-- CK Editor -->
{{ Html::script('medico/js/ckeditor/ckeditor.js') }}

 <!--Select -->
{{ Html::style('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css') }}
{{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js') }}

<!-- datapicker-->
{{ Html::script('medico/js/bootstrap-datepicker.min.js') }}

<!-- Parsley Validator -->
{{ Html::style('medico/css/parsley.css') }}
{{ Html::script('medico/js/parsley.min.js') }}

<!-- toastrs -->
{{ Html::style('medico/css/toastr.min.css') }}
{{ Html::script('medico/js/toastr.min.js') }}

<!-- toastrs-->
{{ Html::script('medico/js/jquery.mask.min.js') }}

<!-- custom-->
{{ Html::script('medico/js/custom.js') }}

<!--DataRange-->
{{ Html::style('https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css') }}
{{ Html::script('https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js') }}

<!-- Datatable-->
{{ Html::style('medico/css/jquery.dataTables.min.css') }}
{{ Html::script('//cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js') }}
{{ Html::script('//cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js') }}
{{ Html::script('medico/js/jquery.dataTables.min.js') }}

@yield('javascript')