
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

            <div class="menu trans_500">
                <div class="menu_content d-flex flex-column align-items-center justify-content-center text-center">
                    <div class="menu_close_container"><div class="menu_close"></div></div>

                    <ul>

                        <li><a href="{{ route('programarcita.index') }}">Programar Cita</a></li>

                        <li><a href="{{route('contraseñaP.index')}}">Cambiar contraseña</a></li>
                        <li></li>
                        <li><a href="{{ route('usuario.index') }}">Usuarios</a></li>
                        <li><a href="{{ route('doctoredit.index')}}">Doctores</a></li>
                        <li><a href="{{ route('servicioedit.index')}}">Servicios</a></li>
                        <li><a href="#">Lista de Mensajes</a></li>


                    </ul>
                </div>

            </div>
        <!-- Header -->

        <header class="header" id="header">
            <div>
                @include('partials.top')
                <div class="header_nav" id="header_nav_pin">
                    <div class="header_nav_inner">
                        <div class="header_nav_container">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <div class="header_nav_content d-flex flex-row align-items-center justify-content-start">
                                            <nav class="main_nav">
                                                <ul class="d-flex flex-row align-items-center justify-content-start">
                                                    <li class="active"><a href="{{ route('programarcita.index') }}">Programar Cita</a></li>
                                                    <li><a href="{{ route('historialCitaP.index') }}">Historial de Cita Programada</a></li>


                                                    <li><a href="{{route('contraseñaP.index')}}">Cambiar contraseña</a></li>

                                                    <li><a href="{{ route('usuario.index') }}">Usuarios</a></li>
                                                    <li><a href="{{ route('doctoredit.index')}}">Doctores</a></li>
                                                     <li><a href="{{ route('servicioedit.index')}}">Servicios</a></li>

                                                    <li><a href="#">Lista de Mensajes</a></li>

                                                </ul>
                                            </nav>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>