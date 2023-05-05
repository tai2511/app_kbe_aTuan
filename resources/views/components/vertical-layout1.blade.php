<div class="row posts-content">
    <div class="col-lg-6 col-sm-12 col-xs-12">
        <div class="img-box" style="background-image: url('{{ asset('storage/storage/' . $data->photo) }}')"></div>
    </div>
    <div class="col-lg-6 col-sm-12 col-xs-12">
        @if (empty($data))
            <div class="feature-content">
                <div class="tag-line">Default data</div>
                <h3>Pieregidio Rebaudo, <br />su abogado de derecho inmobiliario en Mallorca. </h3>
                <div class="p-content">
                    <p>Madre Alemana, padre italiano, título de bachillerato francés, licenciado en derecho y abogado en España. Experiencia plurianual en los contenciosos sobre contratos y sociedades. Desde febrero 2017 trabaja únicamente en el ámbito del derecho inmobiliario y solo en Mallorca, sobre todo en los términos municipales de Calviá y Andratx. Centenares de compras y ventas cerradas con suceso para clientes internacionales. Independiente, competente, fácil de contactar, atento al contexto y consciente de la rapidez necesaria en el ámbito de los negocios. <br /> ue lorem tortor fringilla sed,vestibulum id, eleifend justo  bib <br />-<br /> Abogado del Ilustre Colegio de Abogados de las Islas Baleares (número de colegiado 6476). <br />Oficina con aparcamiento privado en Avenida Jaume I 90, 07180 Santa Ponsa. Se recomienda acordar una cita. </p>
                </div>
            </div>
        @else
            <div class="feature-content">
                <div class="small-img">
                    <img loop=infinite class="mr-4" width="100px" height="100px" src="{{ asset('assets/img/gif/trial.gif') }}" />
                    <img class="mr-4" width="100px" height="100px" src="{{ asset('assets/img/gif/handshake.gif') }}" />
                    <img width="100px" height="100px" src="{{ asset('assets/img/gif/building.gif') }}" />

{{--                    <div class="box mr-5" style="background-image: url('{{ asset('assets/img/gif/trial.gif') }}')"></div>--}}
{{--                    <div class="box" style="background-image: url('{{ asset('assets/img/photo1.jpg') }}')"></div>--}}
                </div>
                <h3>{{ $data->title }}</h3>
                <div class="p-content">
                    {!! $data->content !!}
                </div>
            </div>
        @endif
    </div>
</div>
