@extends("layouts.app")
@section('css_file')
    <link rel="stylesheet" href="{{  asset("assets/css/style.css") }}">
@endsection
@section('content')
    <section class="v-header" id="header">
        <div class="fullscreen-video-wrap d-flex justify-content-center align-items-center">
            <video src="{{  asset("assets/videos/video-home.mp4") }}" id="vbg-video" muted  autoplay="autoplay" loop="loop">
            </video>
            <div class="container text-center content">
                <div class="d-inline-block has-animation animation-ltr" data-delay="10">
                    <img style="width: 400px" class="img-fluid mb-4" src="{{  asset("assets/img/3dcard1.png") }}">
                </div>
                <br>
                <div class="d-inline-block has-animation animation-rtl" data-delay="1000">
                    <h1 class="stroke-text mb-3">Pieregidio Rebaudo</h1>
                </div>
                <br>
                <div class="d-inline-block has-animation animation-ltr font-weight-bold" data-delay="1500" style="margin-bottom: 20px">
                    <p class="color-primary">Deutschsprachiger Anwalt für Immobilienrecht<br>
                        Avocat francophone en droit de l’immobilier<br>
                        English-speaking real estate lawyer<br>
                        Avvocato in diritto immobiliare che parla italiano<br>
                        Адвокат по недвижимости</p>
                </div>
                <br>
{{--                <div class="row text-white info-header">--}}
{{--                    <span class="col-md-4">Address. Avenida Jaume I 90, local 6, 07180 Santa Ponsa - Calviá</span>--}}
{{--                    <span class="col-md-4">Email. rebaudo@icaib.org</span>--}}
{{--                    <span class="col-md-4">Phone. (+34) 645 43 5331</span>--}}
{{--                </div>--}}
                <div class="font-weight-bold d-inline-block has-animation animation-rtl" data-delay="2000">
                    <p class="color-primary">Abogado del Ilustre Colegio de Abogados de las Islas Baleares (número de colegiado 6476)
                    <br><br>
                        <a target="_blank" href="https://www.google.com/maps/place/39%C2%B030'49.7%22N+2%C2%B028'52.0%22E/@39.5144949,2.4807576,16.06z/data=!4m4!3m3!8m2!3d39.5138056!4d2.4811111">Avenida Jaume I 90, local 6, 07180 Santa Ponsa - Calviá</a><br>
                    rebaudo@icaib.org     +34 645 43 5331
                </div>
            </div>
        </div>
        <div class="text-center country-block">
            <span class="country-header">{{ $country }}</span>
        </div>

    </section>
{{--    <div class="has-animation animation-rtl" data-delay="2000">--}}
{{--        <img src="https://images.prismic.io/figaroimmo/943be1d1-6e3a-4c59-a5f1-97ce8b6ea147_lyon-confinement.jpg?auto=compress,format&rect=0,0,1000,667&w=720&h=480" width="600" />--}}
{{--    </div>--}}

{{--    <br>--}}

{{--    <div class="has-animation animation-ltr" data-delay="4000">--}}
{{--        <p class="bigger">END ☺</p>--}}
{{--    </div>--}}


    <header class="header home-page-three">
        <nav class="navbar navbar-expand-lg navbar-dark container">
            <div class="container padding-menu">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                        <img src="{{  asset("assets/img/Rebaudo-03.png") }}" width="121px" alt="Awesome Image" class="default-logo" />
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav-bar" aria-controls="main-nav-bar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="main-nav-bar">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        @php
                            $countries = config('app.countries');
                        @endphp
                        @foreach($countries as $value)
                            <li class="position-relative nav-item {{ $value == $country ? 'active-menu' : '' }} ">
                                <a class="nav-link" href="{{ route('front.page', $value) }}">
{{--                                    <img src="{{  asset("assets/img/flag/$value-flag-icon.png") }}">--}}
                                    {{ $value }}
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
            @foreach ($data as $post)
                @switch($post->layout)
                    @case ('vertical-1')
                        <x-vertical-layout-1 :data="$post" :country="$country"/>
                        @break
                    @case ('vertical-2')
                        <x-vertical-layout-2 :data="$post" :country="$country"/>
                        @break
                    @case ('horizontal')
                        <x-horizontal-layout :data="$post" :country="$country" />
                        @break
                    @default
                        <x-vertical-layout-1 :data="$post" :country="$country"/>
                @endswitch
            @endforeach
        </div>
    </section>

    <!--Google map-->
    <div id="map-container-google-1" class="map-container">
        <iframe src="https://maps.google.com/maps?q=Pieregidio+Rebaudo+(Rechtsanwalt)&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
                style="border:0; height: 275px" allowfullscreen></iframe>
    </div>

    <!--Google Maps-->

    <div class="d-flex justify-content-center footer">
        <span class="vertical-footer"></span>
        <span class="vertical-footer"></span>
        <span class="vertical-footer"></span>
        <span class="vertical-footer"></span>
        <span class="vertical-footer"></span>
    </div>

    <footer>
        <a class="phone icon-fixed text-white" href="tel:+34645435331"><i class="icon-phone"></i></a>
        <div class="scroll-to-top icon-fixed"><i class="icon-up-open"></i></div>
    </footer>

    @section('js')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
        <script src="{{  asset("assets/js/script.js") }}"></script>
    @endsection
@endsection
