@extends("layouts.app")
@section('css_file')
    <link rel="stylesheet" href="{{  asset("assets/css/style.css") }}">
@endsection
@section('content')
    <section class="feature-style-two preview-page">
        <div class="container">
            @php
                $country = $data->country;
            @endphp
            @switch($data->layout)
                @case ('vertical-1')
                <x-vertical-layout-1 :data="$data" :country="$country"/>
                @break
                @case ('vertical-2')
                <x-vertical-layout-2 :data="$data" :country="$country"/>
                @break
                @case ('horizontal')
                <x-horizontal-layout :data="$data" :country="$country" />
                @break
                @default
                <x-vertical-layout-1 :data="$data" :country="$country"/>
            @endswitch
        </div>
    </section>
@endsection
@section('js')
    <script src="{{  asset("assets/js/script.js") }}"></script>
@endsection
