@extends('frontend.layout.principal')
@section('content')
<style type="text/css">
		    .gallery-title
			{
			    font-size: 36px;
			    color: #FF0C39;
			    text-align: center;
			    font-weight: 500;
			    margin-bottom: 70px;
			}
			.gallery-title:after {
			    content: "";
			    position: absolute;
			    width: 7.5%;
			    left: 46.5%;
			    height: 45px;
			    border-bottom: 1px solid #5e5e5e;
			}
			.filter-button
			{
			    font-size: 18px;
			    border: 1px solid #FF0C39;
			    border-radius: 5px;
			    text-align: center;
			    color: #FF0C39;
			    margin-bottom: 30px;

			}
			.filter-button:hover
			{
			    font-size: 18px;
			    border: 1px solid #FF0C39;
			    border-radius: 5px;
			    text-align: center;
			    color: #ffffff;
			    background-color: #FF0C39;

			}
			.btn-default:active .filter-button:active
			{
			    background-color: #FF0C39;
			    color: white;
			}

			.port-image
			{
			    width: 100%;
			}

			.gallery_product
			{
			    margin-bottom: 30px;
			}
				.panel-body > address > ul >li {
				color: #ffffff;
				font-size: 13px;
			}

			.panel-body > h3 {
				color:#ffffff;
				font-size: 15px;
				font-weight: 300px;

			}


			.video2Clic{
				position: absolute; top: 300px; left: 600px;

				 -webkit-transition: width 2s; /* Safari */
 				 transition: width 2s;
			}

		     @media screen and (max-width: 768px) {
		     	.video2Clic{
					 left: 0px;
					 height: 50px;

				}

		     }


		    @media screen and (max-width: 375px) {
				.video2Clic{
					 left: 0px;
					 height: 50px;

				}

		    }

	</style>



		<aside id="colorlib-video">

	        <div id="block2" style="width: 100%; height: 500px;"
			  data-vide-bg="mp4: {{ url('') }}/liga/video/G4-WEB"
			  data-vide-options="position: 0% 50% muted: false, loop: true,">

			</div>
			<a  href="#" class="btn btn-danger video2Clic jsVideo"  data-video-id='GIvvHmftGuI'>Ver más</a>


		</aside>


            <div class="col-md-12"></div>


	            <div class="colorlib-classes ">
				<div class="container">
						<div class="row">
							<div class="col-md-12 colorlib-heading center-heading text-center animate-box toptitle">
								<h1 class="heading-big">VIRUS DEL PAPILOMA HUMANO</h1>
								<h2>"Campaña por el mes mundial contra el virus el virus del papiloma humano"</h2>

							</div>
						</div>
						<div class="row">

							<div class="col-xs-12 col-md-12 ">
								  <a href="#" class="thumbnail animate-box" style="border: 0;">
						             <img src="{{ url('liga/images/logo/vph.png') }}" width="400px" height="400px" class="img-responsive">
						        </a>
							</div>
						</div>
							<br>
							<br>
							<br>
							<div class="row">
								<div class="col-md-12 animate-box text-justify">
									<p>
										&nbsp;&nbsp;&nbsp;&nbsp;Un millón de selfies son compartidas diariamente a nivel mundial, es decir, al año se generan 365 millones de selfies. El 34% de estas, son tomadas junto a familiares, las cuales podrían estar incompletas a causa del Virus del Papiloma Humano y las enfermedades que genera: cáncer de cuello uterino, boca, lengua, garganta, pene, ano, vagina, vulva y verrugas genitales.
									</p>
									<p>
										&nbsp;&nbsp;&nbsp;&nbsp;Por ello, por segundo año consecutivo, más de 80 países se unirán para lanzar la Campaña Mundial Contra el Virus del Papiloma Humano en el mes de marzo. En Perú esta iniciativa será liderada por la Liga Contra el Cáncer, a través de la campaña “Captura Momentos, No VPH”, una campaña que busca evitar fotos familiares incompletas, dando a conocer a la población la peligrosidad de este virus y cómo puede evitarse a través de la vacunación gratuita de las niñas de 5to grado de primaria de colegios públicos y privados y además de la realización de chequeos preventivos.
									</p>


									<h3><b>¿Qué es el virus del papiloma humano?
									</b></h3>

									<p>
									&nbsp;&nbsp;&nbsp;&nbsp;El Virus del Papiloma Humano (VPH) es un virus altamente contagioso que afecta a mujeres y hombres generando cáncer de cuello uterino, verrugas genitales y otras enfermedades como cáncer de boca, lengua, garganta, pene, ano, vagina y vulva. Sin embargo, en el Perú aún existe desconocimiento sobre la peligrosidad de este virus y cómo puede evitarse. Existen más de 100 tipos de Virus del Papiloma Humano, de los cuales 14 se relacionan al cáncer y podrían generar con el tiempo algunas de estas riesgosas enfermedades.
									</p>

									<p>
									&nbsp;&nbsp;&nbsp;&nbsp;En el mundo 660 millones de personas que padecen del Virus del Papiloma Humano pudiendo estar en riesgo a las enfermedades que ocasiona, las cuales podrían evitarse a través de la vacunación de todos: niñas, niños, adolescentes, mujeres y hombres adultos y chequeos preventivos anuales.
									</p>

									<p>
									&nbsp;&nbsp;&nbsp;&nbsp;En el Perú, 9 de cada 10 hombres y mujeres sexualmente activos se infectarán con el Virus del Papiloma Humano, es decir el 90% de la población, estando en riesgo de generar estas enfermedades. La mayoría de estas personas no presentan síntomas, por ello, cualquier persona puede contagiarse y trasmitirlo sin darse cuenta. Cada día en el Perú fallecen entre 5 a 6 mujeres por algún tipo de cáncer relacionado con el Virus del Papiloma Humano.
									</p>

									<h3><b>
									¿Cuáles son los métodos de prevención contra el virus de papiloma humano?
									</b></h3>

									<p>El Virus del Papiloma Humano puede prevenirse a través:</p>


									<h3><b>1 - Vacunación</b></h3>
									<p>
										<ul>
											<li>
												La vacuna para prevenir el Virus del Papiloma Humano protege a MUJERES Y HOMBRES contra el cáncer de cuello uterino, vagina, vulva, ano y verrugas genitales. Este método, es considerado el más seguro y eficaz para evitar la infección del VPH.
											</li><br>
											<li>
												 La vacuna debe ser aplicada en NIÑAS Y NIÑOS desde los 9 años hasta los 14, a través de 2 dosis con un intervalo de 6 meses. En el caso de las MUJERES Y VARONES desde los 15 años en adelante, deben de aplicarse 3 dosis. La segunda dosis después de los 2 meses de aplicada la primera y tercera dosis a partir de los 4 meses de aplicada la segunda dosis.
											</li>
											<br>
											<li>
												 Los padres de niñas, niños, adolescentes o mujeres y hombres adultos que deseen aplicarse la vacuna, pueden solicitar información de la vacuna y costos en la Liga Contra el Cáncer, Clínicas o Centros de Vacunación.
											</li>
										</ul>

									</p>
									<h3><b>2 - Chequeo Preventivos</b></h3>

										<ul>
											<li>
												Todas las mujeres y los varones deben realizarse un chequeo preventivo una vez al año. Si bien el chequeo no evita la infección por el Virus de Papiloma Humano, permite detectar y tratar los tipos de cáncer ocasionados por el VPH.
											</li>
											<br>
											<li>
												 Para las mujeres existen pruebas como el VPH Cobas, considerada como una de las mejores pruebas que permiten diagnosticar el VPH varios años antes de que aparezcan lesiones malignas, ayudando a prevenir el cáncer entre otras infecciones.
											</li>
										</ul>


								</div>


								<div class="col-md-3"></div>

							</div>

				<br><br><br>
				<div class="row">
					<div class="col-md-12 colorlib-heading center-heading text-center animate-box">
						<h1 class="heading-big">Consentimiento informado</h1>
						<h2>Consentimiento informado<br>
						<!--	<small>Elaborado por la Liga Contra el Cáncer.</small>-->
						</h2>
					</div>
				</div>
				<div class="row">
					<div class="container">
						<div class="col-xs-offset-3 col-md-offset-5 animate-box" style="">

							<a href="{{ url('liga/pdf/CONSENTIMIENTO_INFORMADO_2019.pdf') }}" download="LCCInformeAnálisisdelaSituacióndelCáncerEnElPeru2019_DMCC.pdf" target="_blanck"><img src="{{ url('liga/images/PDF-ico.png') }}" width="100px" height="170px" style="margin:auto 50px" class="img-responsive ">
							</a>

						</div>
					</div>
				</div>


			</div>
		</div><br><br><br>



@endsection
@section('scritps')


{{ Html::script('liga/js/jquery.vide.js') }}

{{ Html::style('liga/css/modal-video.min.css') }}
{{ Html::script('liga/js/jquery-modal-video.min.js') }}


{{ Html::script('liga/js/main_principal.js') }}

<script>

  $(function() {




    $(".jsVideo").modalVideo({
           youtube:{
            controls: 0,
            autoplay: 1,
            nocookie: true,
            playlist: null,
            playsinline: null,

            cc_load_policy: 1,
            color: null,
            disablekb: 0,
            enablejsapi: 0,
            end: null,
            fs: 1,
            h1: null,
            iv_load_policy: 1,
            list: null,
            listType: null,
            loop: 0,
            modestbranding: null,
            origin: null,
            rel: 0,
            showinfo: 1,
            start: 0,
            wmode: 'transparent',
            theme: 'dark'

        }
      });


});

</script>


@endsection