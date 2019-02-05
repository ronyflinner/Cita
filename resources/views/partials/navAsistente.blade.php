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

            </div>
            <div class="col-sm-6 col-md-6">
              <p class="bold text-right">Central Telefónica: (511) 204-0404</p>
            </div>
          </div>
        </div>
      </div>
      <div class="container navigation">

        <div class="navbar-header page-scroll">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
           <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ url('health/images/lcc.png') }}" alt="" width="100" height="40" />
          </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
          <ul class="nav navbar-nav">
            <li><a href="{{ route('programarcita.index') }}">Verificar Asistencia</a></li>
            <li><a href="{{ route('historialCitaP.index') }}">Crear Cita</a></li>
            <li><a href="{{route('contraseñaP.index')}}">Cambiar contraseña</a></li>
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
