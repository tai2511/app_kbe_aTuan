@extends("layouts.app")
@section('css_file')
    <link rel="stylesheet" href="{{  asset("assets/css/style.css") }}">
@endsection
@section('content')
    <section class="v-header" id="header">
        <div class="fullscreen-video-wrap">
            <video src="{{  asset("assets/videos/home-3-video.mp4") }}" id="vbg-video" muted  autoplay="autoplay" loop="loop">
            </video>
        </div>
    </section>
    <header class="header home-page-three">
        <nav class="navbar navbar-expand">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                        <img src="{{  asset("assets/img/logo-1-1.png") }}" alt="Awesome Image" class="default-logo" />
                    </a>
                </div>
                <div id="main-nav-bar">
                    <ul class="nav navbar-nav ml-auto mt-2 mt-lg-0">
                        @php
                            $countries = config('app.countries');
                        @endphp
                        @foreach($countries as $country)
                            <li class="nav-item mr-1 ml-1 mr-md-4 ml-md-4 mr-sm-3 ml-sm-3 "  style="flex: 1">
                                <a class="nav-link" href="{{ route('front.page', $country) }}">
                                    <img src="{{  asset("assets/img/flag/$country-flag-icon.png") }}">
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section class="feature-style-two">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12col-xs-12">
                    <div class="img-box gradient-three">
                        <div class="inner">
                            <img src="{{  asset("img/features-2-2.jpg") }}" alt="Awesome Image"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    @if (empty($data['first_post']))
                        <div class="feature-content">
                            <div class="tag-line">Default data</div>
                            <h3>Pieregidio Rebaudo, <br />su abogado de derecho inmobiliario en Mallorca. </h3>
                            <p>Madre Alemana, padre italiano, título de bachillerato francés, licenciado en derecho y abogado en España. Experiencia plurianual en los contenciosos sobre contratos y sociedades. Desde febrero 2017 trabaja únicamente en el ámbito del derecho inmobiliario y solo en Mallorca, sobre todo en los términos municipales de Calviá y Andratx. Centenares de compras y ventas cerradas con suceso para clientes internacionales. Independiente, competente, fácil de contactar, atento al contexto y consciente de la rapidez necesaria en el ámbito de los negocios. <br /> ue lorem tortor fringilla sed,vestibulum id, eleifend justo  bib <br />-<br /> Abogado del Ilustre Colegio de Abogados de las Islas Baleares (número de colegiado 6476). <br />Oficina con aparcamiento privado en Avenida Jaume I 90, 07180 Santa Ponsa. Se recomienda acordar una cita. </p>
                            <button class="btn view-more">view more</button>
                        </div>
                    @else
                        <div class="feature-content">
                            <div class="tag-line">{{ $data['country'] }}</div>
                            <h3>{{ $data['first_post']->title }}</h3>
                            {!! $data['first_post']->content !!}
                            <button class="btn view-more">view more</button>
                        </div>
                    @endif
                </div>
            </div>

            <div class="row second-post">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="img-box gradient-three float-right">
                        <div class="inner">
                            <img src="{{  asset("img/features-2-2.jpg") }}" alt="Awesome Image"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    @if (empty($data['second_post']))
                        <div class="feature-content">
                            <div class="tag-line">Default data</div>
                            <h3>Pieregidio Rebaudo, <br />su abogado de derecho inmobiliario en Mallorca. </h3>
                            <p>Madre Alemana, padre italiano, título de bachillerato francés, licenciado en derecho y abogado en España. Experiencia plurianual en los contenciosos sobre contratos y sociedades. Desde febrero 2017 trabaja únicamente en el ámbito del derecho inmobiliario y solo en Mallorca, sobre todo en los términos municipales de Calviá y Andratx. Centenares de compras y ventas cerradas con suceso para clientes internacionales. Independiente, competente, fácil de contactar, atento al contexto y consciente de la rapidez necesaria en el ámbito de los negocios. <br /> ue lorem tortor fringilla sed,vestibulum id, eleifend justo  bib <br />-<br /> Abogado del Ilustre Colegio de Abogados de las Islas Baleares (número de colegiado 6476). <br />Oficina con aparcamiento privado en Avenida Jaume I 90, 07180 Santa Ponsa. Se recomienda acordar una cita. </p>
                            <button class="btn view-more">view more</button>
                        </div>
                    @else
                        <div class="feature-content">
                            <div class="tag-line">{{ $data['country'] }}</div>
                            <h3>{{ $data['second_post']->title }}</h3>
                            {!! $data['second_post']->content !!}
                            <button class="btn view-more">view more</button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!--Google map-->
    <div id="map-container-google-1" class="mt-5 mb-5 map-container" style="height: 400px">
        <iframe src="https://maps.google.com/maps?q=hanoi&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
                style="border:0" allowfullscreen></iframe>
    </div>

    <!--Google Maps-->

    <section class="contact-style-one" >
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-content">
                        <h3>Pieregidio Rebaudo<br /> Avenida Jaume I 90, local 6, 07180 Santa Ponsa - Calviá</h3>
                        <div class="contact-info">
                            <p><span>Email:</span> rebaudo@icaib.org <br /> <span>Phone:</span> (+34) 645 43 5331 </p>
                        </div>
                        <p>Having trouble? Find the answer to your query <br /> here. Don’t hasitate to contact us!</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <form class="contact-form">
                        <input type="text" placeholder="Your name" name="name" />
                        <input type="text" placeholder="Your mail address" name="email" />
                        <input type="text" placeholder="Subject" name="subject" />
                        <textarea name="message" placeholder="Your message"></textarea>
                        <button class="btn" type="submit">Send message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <a class="phone icon-fixed text-white" href="tel:0123456789"><i class="icon-phone"></i></a>
        <div class="scroll-to-top icon-fixed"><i class="icon-up-open"></i></div>
    </footer>

    @section('js')
        <script src="{{  asset("assets/js/script.js") }}"></script>
    @endsection
@endsection
