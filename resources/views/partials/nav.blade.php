

    <body>

   <div class="fh5co-loader"></div>
   <!--<div class="text-center" id="fakeLoader"></div>-->

    <div id="page">

<div class="home">

<style type="text/css">
    .home{
        height: 180px;
    }

</style>
         <!-- Menu -->
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
      <div class="top-area">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 col-md-6">
               <p class="bold ">
                <marquee behavior="" direction="">
                  <p>Bienvenido al Sistema de Cita - Versión Beta-1.8   {{verificarEstadoUsuario()}}</p>


               </marquee>                       </p>

            </div>
            <div class="col-sm-6 col-md-6">
              <p class="bold text-right">Bienenid@: {{ Auth::user()->NombreCompleto }}</p>


            </div>
          </div>
        </div>
      </div>
      <div class="container navigation">

        <div class="navbar-header page-scroll">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
           <a class="navbar-brand" href="#">
                    <img src="{{ url('medico/img/lcc.png') }}" alt="" width="100" height="40" />
          </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
          <ul class="nav navbar-nav">


            <!-- Administrador -->
            @hasrole('Administrador')

                @can('ver Programar Cita')
                   <li class="{{active_class(if_uri_pattern(['admin/programarcita'],'active','other'))}}"><a href="{{ route('programarcita.index') }}">Programar Cita</a></li>
                @endcan
                @can('ver consultar citas')
                   <li class="{{active_class(if_uri_pattern(['admin/historialCitaP'],'active','other'))}}"><a href="{{ route('historialCitaP.index') }}">Consultar Citas</a></li>
                @endcan
                @can('ver administración')
                <li class="dropdown " >

                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administración</a>
                  <ul class="dropdown-menu">
                    @can('ver usuarios')
                    <li class="{{active_class(if_uri_pattern(['admin/usuarioP'],'active','other'))}}"><a href="{{ route('usuario.index') }}">Usuarios</a></li>
                    @endcan
                    @can('ver doctores')
                    <li class="{{active_class(if_uri_pattern(['admin/doctoredit'],'active','other'))}}"><a href="{{ route('doctoredit.index')}}">Doctores</a></li>
                    @endcan
                    @can('ver servicios')
                    <li class="{{active_class(if_uri_pattern(['admin/servicioedit'],'active','other'))}}"><a href="{{ route('servicioedit.index')}}">Servicios</a></li>
                    @endcan
                    @can('ver logs')
                    <li class="{{active_class(if_uri_pattern(['admin/logs'],'active','other'))}}"><a href="{{ url('admin/logs') }}">Logs</a></li>
                    @endcan
                  </ul>
                </li>
                @endcan

                @can('ver lista contacto')

                  <li class="{{active_class(if_uri_pattern(['admin/usuario/listameonsaje'],'active','other'))}}"><a href="{{ route('listameonsaje.index') }}">Lista de Mensajes</a></li>
                @endcan
             <!-- Fin Administrador -->
            @endhasrole
            @hasrole('Paciente')
            <!-- Paciente -->

                @can('ver crear cita')
                    <li class="{{active_class(if_uri_pattern(['admin/usuario/crearcita'],'active','other'))}}"><a href="{{ route('crearcita.index') }}">Crear Cita</a></li>
                @endcan
                @can('ver cita programada')
                    <li class="{{active_class(if_uri_pattern(['admin/usuario/citaprogramada'],'active','other'))}}"><a href="{{ route('citaprogramada.index') }}">Cita Programada</a></li>
                @endcan
                @can('ver Historia')
                    <li ><a href="{{ route('historialcita.index') }}">Historia</a></li>
                @endcan
                @can('ver contacto')
                    <li class="{{active_class(if_uri_pattern(['admin/usuario/contacto'],'active','other'))}}"><a href="{{ route('contacto.index') }}">Contáctanos</a></li>
                @endcan

            <!-- Fin Paciente -->
            @endhasrole
            @hasrole('Asistente')

            <!-- Asistente -->
                @can('ver asistencia')
                  <li class="{{active_class(if_uri_pattern(['admin/verificarcita'],'active','other'))}}"><a href="{{ route('verificarcita.index') }}">Verificar Asistencia</a></li>
                @endcan
                @can('ver crear asistencia manual')
                  <li class="{{active_class(if_uri_pattern(['admin/asistente/crearcita'],'active','other'))}}"><a href="{{ route('admin.crearManualCita') }}">Crear Cita</a></li>
                @endcan

                 <li class="{{active_class(if_uri_pattern(['admin/usuario/create'],'active','other'))}}"><a href="{{ route('usuario.create') }}" >Crear Usuario</a></li>
            <!-- Fin asistente-->
            @endhasrole
                @can('ver clave')
                   <li class="{{active_class(if_uri_pattern(['admin/contraseñaP'],'active','other'))}}"><a href="{{route('contraseñaP.index')}}">Cambiar contraseña</a></li>
                @endcan

             <li>
               <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();" >Cerrar Sesion</a>


                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->

    </nav>

