
    <body>

   <div class="fh5co-loader"></div>
   <!--<div class="text-center" id="fakeLoader"></div>-->

    <div id="page">

<div class="home">
        <div class="background_image" style="background-image:url(health/images/index_hero.jpg)"></div>
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
                    <img src="{{ url('medico/img/lcc.png') }}" alt="" width="100" height="40" />
          </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="{{ url('/') }}" >Inicio</a></li>
            <li><a href="{{ route('quienesSomos') }}" target="_blank">Quiénes Somos</a></li>
            <li><a href="{{ route('queHacemos') }}" target="_blank">Qué Hacemos</a></li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
    </nav>