@extends("layouts.app")
@section('css_file')
    <link rel="stylesheet" href="{{  asset("assets/css/style.css") }}">
@endsection
@section('content')
    <section class="v-header" id="header">
        <div class="fullscreen-video-wrap">
            <video src="{{  asset("assets/videos/home-2-video.mp4") }}" id="vbg-video" muted  autoplay="autoplay" loop="loop">
            </video>
        </div>
    </section>
    <header class="header home-page-three">
        <nav class="navbar navbar-expand container padding-md-0">
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
                        @foreach($countries as $value)
                            <li class="nav-item mr-md-4 ml-md-4 mr-sm-3 ml-sm-3 flex-1 {{ $value == $country ? '' : 'main-menu' }}">
                                <a class="nav-link" href="{{ route('front.page', $value) }}">
                                    <img src="{{  asset("assets/img/flag/$value-flag-icon.png") }}">
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
                        <textarea name="message" placeholder="Your message" style="padding-top: 13px"></textarea>
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
