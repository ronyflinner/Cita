<style>
    .alta{
        font-size: 130px;
        font-weight: 300;
    }
</style>

<div class="header_top">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="header_top_content d-flex flex-row align-items-center justify-content-start">
                    <div class="logo">
                          <a href="{{ url('admin/home') }}">
                        <img src="{{ url('health/images/lcc.png') }}" alt="" width="140px" height="60px">
                        </a>
                    </div>
                    <div class="header_top_extra d-flex flex-row align-items-center justify-content-start ml-auto">
                        <div class="header_top_nav">
                            <ul class="d-flex flex-row align-items-center justify-content-start">
                                <li><a href="https://www.ligacancer.org.pe/quienesomos.html" target="_blank">Quiénes Somos</a></li>
                                <li><a href="https://www.ligacancer.org.pe/quehacemos.html" target="_blank">Qué Hacemos</a></li>
                                <li><a href="https://www.ligacancer.org.pe/staffmedico.html" target="_blank">Staff Médico</a></li>
                            </ul>
                        </div>

                        <div class="header_top_phone">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <span>Central Telefónica: (511) 204-0404  </span>
                        </div>
                        <div class="header_top_phone">
                            <span class="btn btn-danger text-white" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                               Cerrar Sesión
                            </span>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>


                        </div>
                    </div>
                    <div class="hamburger ml-auto"><i class="fa fa-bars" aria-hidden="true"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>