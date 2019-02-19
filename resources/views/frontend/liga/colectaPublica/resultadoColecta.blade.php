@extends('frontend.layout.principal')
@section('content')

		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url({{ url('liga/images/Sliders-web/8.jpg') }});">
			   	</li>
			   	</ul>
		  	</div>
		</aside>

 <div class="colorlib-classes">
			<div class="container">
				<div class="row">
					<div class="col-md-12 colorlib-heading center-heading text-center animate-box">
					    <h1 class="heading-big">COLECTA PÚBLICA</h1>
						<h2 style="color: #FF0C39">COLECTA PÚBLICA</h2>
					</div>
					<div class="col-md-8 col-md-offset-2 animate-box">
					<p align="justify"> La Liga Contra el Cáncer realizará <strong>los días miércoles 05, jueves 06 y viernes 07 de setiembre </strong>su Colecta Pública Nacional 2018, la cual tiene como objetivo recaudar fondos para que la institución continué realizando Acciones de prevención en la población menos favorecida como: </p>
					</div>
				</div>
			  <div class="col-md-12 animate-box">
                 <div class="col-md-4" align="center">
                 <a href="{{ url('liga/images/colecta/imagenes-1/1.jpg') }}" data-toggle="lightbox" data-gallery="example-gallery">
                 <img src="{{ url('liga/images/colecta/imagenes-1/1-1.jpg') }}" width="300px" height="300px"  class="img-fluid"></a>
                 <div class="classes-entry">
                 <div class="desc">
					 <h3>Despistajes Preventivos</h3>
			    </div>
                </div>
                 </div>
                 <div class="col-md-4"  align="center">
                 <a href="{{ url('liga/images/colecta/imagenes-1/2.jpg') }}" data-toggle="lightbox" data-gallery="example-gallery">
                 <img src="{{ url('liga/images/colecta/imagenes-1/2-2.jpg') }}" width="300px" height="300px"  class="img-fluid text-center"></a>
                 <div class="classes-entry">
                 <div class="desc"><h3>Programas educativos</h3></div>
                </div>
                </div>
                 <div class="col-md-4"  align="center">
                <a href="{{ url('liga/images/colecta/imagenes-1/3.jpg') }}" data-toggle="lightbox" data-gallery="example-gallery">
                <img src="{{ url('liga/images/colecta/imagenes-1/3-3.jpg') }}"  width="300px" height="300px" class="img-fluid"></a>
				<div class="classes-entry">
                <div class="desc"><h3>Charlas informativas</h3></div>
                </div>
                </div>
                <div class="col-md-12"></div>
		        <div class="col-md-10 animate-box col-md-offset-1" align="center">
					 <p align="justify">Acciones que permiten prevenir el cáncer en nuestro país gracias a la detección oportuna de la enfermedad.</p>
                     <p align="justify">La Colecta Pública Nacional 2018, cuenta con el apoyo de Telefónica, Rímac, VisaNet, Prosegur y Urbano, contará con la participación de más de 10 mil voluntarios quienes estarán identificados con polos, chalecos y credenciales en Lima Metropolitana, Callao y las 16 provincias donde la institución tiene filiales. </p>
				    </div>
			</div>
       </div>
</div>

       <div class="colorlib-trainers">
			<div class="container">
				<div class="row row-pb-md">
				      <div class="col-md-12 colorlib-heading center-heading text-center animate-box">
						<h1 class="heading-big">Embajadores</h1>
						<h2 style="color: #FFFFFF">Embajadores</h2>
					   </div>
					<div class="col-md-3 col-sm-3 animate-box">
						<div class="trainers-entry">
							<div class="desc">
								<h3 style="color: #FFFFFF">Monica Delta</h3>
								<span style="color: #FFF">Embajadora Latina</span>
							</div>
							<div class="trainer-img" style="background-image: url({{ url('liga/images/colecta/embajadores/1.jpg') }})"></div>
						</div>
					</div>
                    <div class="col-md-3 col-sm-3 animate-box">
                        <div class="trainers-entry">
							<div class="desc">
								<h3 style="color: #FFFFFF">Pedro Tenorio</h3>
								<span style="color: #FFFFFF">Embajador Latina</span>
							</div>
							<div class="trainer-img" style="background-image: url({{ url('liga/images/colecta/embajadores/2.jpg') }})"></div>
						</div>
                    </div>
                    <div class="col-md-3 col-sm-3 animate-box ">
                    	<div class="trainers-entry">
							<div class="desc">
								<h3 style="color: #FFFFFF">Augusto Thorndike</h3>
								<span style="color: #FFFFFF">Embajador América TV y Canal N</span>
							</div>
							<div class="trainer-img" style="background-image: url({{ url('liga/images/colecta/embajadores/3.jpg') }})"></div>
						</div>
                    </div>
                    <div class="col-md-3 col-sm-3 animate-box">
                    	<div class="trainers-entry">
							<div class="desc">
								<h3 style="color: #FFFFFF">Mabel Huertas </h3>
								<span style="color: #FFFFFF">Embajadora de Panamericana</span>
							</div>
							<div class="trainer-img" style="background-image: url({{ url('liga/images/colecta/embajadores/4.jpg') }})"></div>
						</div>
                    </div>
                  </div>
                  <div class="row">
					<div class="col-md-3 col-sm-3 animate-box">
						<div class="trainers-entry">
							<div class="desc">
								<h3 style="color: #FFFFFF">Antonia del Solar</h3>
								<span style="color: #FFFFFF">Embajadora Movistar Plus</span>
							</div>
							<div class="trainer-img" style="background-image: url({{ url('liga/images/colecta/embajadores/5.jpg') }})"></div>
						</div>
					</div>
                    <div class="col-md-3 col-sm-3 animate-box">
						<div class="trainers-entry">
							<div class="desc">
								<h3 style="color: #FFFFFF">Diego Rebagliati </h3>
								<span style="color: #FFFFFF">Embajadora Movistar Deportistas</span>
							</div>
							<div class="trainer-img" style="background-image: url({{ url('liga/images/colecta/embajadores/6.jpg') }})"></div>
						 </div>
					</div>
                    <div class="col-md-3 col-sm-3 animate-box">
						<div class="trainers-entry">
							<div class="desc">
								<h3 style="color: #FFFFFF">Fátima Saldonid </h3>
								<span style="color: #FFFFFF">Embajadora TV Perú</span>
							</div>
							<div class="trainer-img" style="background-image: url({{ url('liga/images/colecta/embajadores/7.jpg') }})"></div>

						</div>
					</div>
                    <div class="col-md-3 col-sm-3 animate-box">
						<div class="trainers-entry">
							<div class="desc">
								<h3 style="color: #FFFFFF">Fernanda Kano</h3>
								<span style="color: #FFFFFF">Embajadora Grupo RPP</span>
							</div>
							<div class="trainer-img" style="background-image: url({{ url('liga/images/colecta/embajadores/8.jpg') }})"></div>
                        </div>
					</div>
				</div>
		     </div>
		</div>
@endsection

@section('scritps')
{{ Html::script('liga/js/main_principal.js') }}

@endsection