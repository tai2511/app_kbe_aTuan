<div class="posts-content horizontal-post">
{{--    <div class="box-gradient"></div>--}}
    <div class="img-box" style="background-image: url('{{ asset('storage/storage/' . $data->photo) }}')"></div>
    @if (empty($data))
        <div class="feature-content row">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="tag-line">Default data</div>
                <h3>Pieregidio Rebaudo, <br />su abogado de derecho inmobiliario en Mallorca. </h3>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="p-content">
                    <p>Madre Alemana, padre italiano, título de bachillerato francés, licenciado en derecho y abogado en España. Experiencia plurianual en los contenciosos sobre contratos y sociedades. Desde febrero 2017 trabaja únicamente en el ámbito del derecho inmobiliario y solo en Mallorca, sobre todo en los términos municipales de Calviá y Andratx. Centenares de compras y ventas cerradas con suceso para clientes internacionales. Independiente, competente, fácil de contactar, atento al contexto y consciente de la rapidez necesaria en el ámbito de los negocios. <br /> ue lorem tortor fringilla sed,vestibulum id, eleifend justo  bib <br />-<br /> Abogado del Ilustre Colegio de Abogados de las Islas Baleares (número de colegiado 6476). <br />Oficina con aparcamiento privado en Avenida Jaume I 90, 07180 Santa Ponsa. Se recomienda acordar una cita. </p>
                </div>
            </div>
        </div>
    @else
        <div class="feature-content row">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="tag-line">{{ $country }}</div>
                <h3>{{ $data->title }}</h3>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="p-content" style="-webkit-line-clamp: 10 ;">
                    {!! $data->content !!}
                </div>
            </div>
        </div>
    @endif
</div>
