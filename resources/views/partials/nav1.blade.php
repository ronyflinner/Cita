
    <body>

   <div class="fh5co-loader"></div>
   <!--<div class="text-center" id="fakeLoader"></div>-->

    <div id="page">

<div class="home">
        <div class="background_image" style="background-image:url(health/images/index_hero.jpg)"></div>

        <!-- Header -->

        <header class="header" id="header">
            <div>
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
                                                <li><a href="#">Help Desk</a></li>
                                                <li><a href="#">Emergency Services</a></li>
                                                <li><a href="#">Appointment</a></li>
                                            </ul>
                                        </div>
                                        <div class="header_top_phone">
                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                            <span>+34 586 778 8892</span>
                                        </div>
                                    </div>
                                    <div class="hamburger ml-auto"><i class="fa fa-bars" aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

         <li class="menu_item"><a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>