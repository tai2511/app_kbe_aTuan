<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function getPostData($country){
        $countries = config('app.countries');
        if (!in_array($country, $countries)) {
            return abort(404);
        }
        $langId = array_search($country, $countries);
        $data = $this->getData($langId);
        return view('clients.frontend.home', compact('data', 'country'));
    }

    private function getData($langId){
        // feature2
        // 'countries' => array(
        //        1 => 'deutsch',
        //        2 => 'français',
        //        3 => 'english',
        //        4 => 'pусский',
        //        5 => 'italiano',
        //        6 => 'español',
        //    ),
        $config = [
            [
                'Pieregidio Rebaudo, Ihr deutschsprachiger Anwalt für Immobilienrecht.',
                '<p class="ql-align-justify"><span style="color: black;">Deutsche Mutter, Jurastudium und Rechtsanwaltstitel in Spanien. Langjährige gerichtliche Rechtsanwaltserfahrung in Vertragsrecht und Gesellschaftsrecht. Seit Februar 2017 ausschließlich als Anwalt für Immobilienrecht beschäftigt und nur auf Mallorca, hauptsächlich für Liegenschaften in den Gemeinden Calvià und Andratx. Hunderte von Immobilienerwerbe und Verkäufe für internationale Mandanten erfolgreich abgeschlossen. Unabhängig, kompetent, direkt ansprechbar, mitdenkend und bewusst der nötigen Reaktionsgeschwindigkeit in der Geschäftswelt.&nbsp;</span></p><p class="ql-align-justify"><br></p><p class="ql-align-justify"><span style="color: black;">Rechtsanwalt der Rechtsanwaltskammer der Balearen (eingetragen mit der Nummer 6476).&nbsp;</span></p><p class="ql-align-justify"><br></p><p class="ql-align-justify"><span style="color: black;">Kanzlei in Santa Ponsa mit privatem Parkplatz.&nbsp;Terminabsprache ist erwünscht.&nbsp;</span></p><p class="ql-align-justify"><br></p>'
            ],
            [
                'Pieregidio Rebaudo, votre avocat francophone de droit de l‘immobilier.',
                '<p><span style="color: black;">Baccalauréat série L (littéraire) obtenu avec mention en France, avocat en Espagne. Expérience pluriannuelle en contentieux de droit des contrats et des sociétés. Depuis février 2017 exclusivement avocat de droit de l’immobilier et uniquement à Majorque, particulièrement dans les municipalités de Calvià et Andratx. Plusieurs centaines d’acquisitions et de ventes menées à bon terme pour des clients internationaux. Indépendant, compétent, directement joignable et à disposition, doté d’une vue d’ensemble et conscient des temps de réaction exigés dans le monde des affaires.&nbsp;</span></p><p><span style="color: black;"><span class="ql-cursor">﻿﻿﻿﻿﻿﻿</span></span></p><p><span style="color: black;">Avocat du barreau des Baléares (numéro d’inscription 6476). Cabinet à Santa Ponsa avec parking privé. Il est recommandé de fixer un rendez-vous.&nbsp;&nbsp;</span></p>'
            ],
            [
                'Pieregidio Rebaudo, your English-speaking real estate lawyer.',
                '<p><span style="color: black;">Lawyer of the Balearic bar association (member number 6476). Long experience as a litigator for corporate and contract matters. Since February 2017 Pieregidio Rebaudo works only as a real estate lawyer and exclusively in Mallorca, mainly in the municipalities of Calvià and Andratx. Hundreds of real estate purchase and sale contracts successfully closed for international clients. Independent, competent, directly contactable, solution oriented, conscient of the broader picture and of the responsiveness needed in a fast-paced business world.&nbsp;&nbsp;</span></p><p><span style="color: black;"><span class="ql-cursor">﻿﻿﻿﻿﻿</span></span></p><p><span style="color: black;">Office in Santa Ponsa with private parking. It is recommended to agree an appointment.&nbsp;</span></p>'
            ],
            [
                'Пьереджидио Ребаудо, адвокат в сфере недвижимости, с возможностью сотрудничества на русском языке.',
                '<p><span style="color: black;">Адвокат Балеарской коллегии адвокатов (членский номер 6476). Многолетний опыт судебных разбирательств в области договорного и корпоративного права. С февраля 2017 года работает исключительно в сфере недвижимости на Майорке, в основном в муниципалитетах Кальвия и Андрач. Сотни сделок по приобретению и продаже недвижимости, заключенных в пользу международных клиентов.&nbsp;</span></p><p><span style="color: black;"><span class="ql-cursor">﻿﻿﻿</span></span></p><p><span style="color: black;">Юридическая фирма в Санта-Понса, с частной парковкой. Рекомендуется предварительная запись по телефону +34 655932360.&nbsp;</span></p>'
            ],
            [
                'Pieregidio Rebaudo, avvocato in diritto immobiliare.',
                '<p><span style="color: black;">Italo-tedesco con diploma scolastico francese, titolo universitario spagnolo e avvocato in Spagna. Esperienza pluriennale in contenziosi di diritto dei contratti e societario. Dal febbraio 2017 lavora unicamente nell’ambito del diritto immobiliare e solo a Mallorca, soprattutto nei comuni di Calvià e Andratx. Centinaia di acquisizioni e vendite di immobili concluse a favore di clienti internazionali. Indipendente, competente, facilmente contattabile, dalle soluzioni con visione d’insieme e cosciente della rapidità di reazione necessaria nel mondo degli affari.&nbsp;</span></p><p><span style="color: black;"><span class="ql-cursor">﻿﻿</span></span></p><p><span style="color: black;">Avvocato dell’ordine degli avvocati delle Baleari (tesserino numero 6476). Studio legale a Santa Ponsa, con parcheggio privato. Si consiglia di fissare un appuntamento.&nbsp;&nbsp;</span></p>'
            ],
            [
                'Pieregidio Rebaudo, su abogado de derecho inmobiliario en Mallorca.',
                '<p><span style="color: black;">Abogado del Ilustre Colegio de Abogados de las Islas Baleares (número de colegiado 6476). Experiencia plurianual en los contenciosos sobre contratos y sociedades. Desde febrero 2017 trabaja únicamente en el ámbito del derecho inmobiliario y solo en Mallorca, sobre todo en los términos municipales de Calviá y Andratx. Centenares de compras y ventas cerradas con suceso para clientes internacionales. Independiente, competente, fácil de contactar, atento al contexto y consciente de la rapidez necesaria en el ámbito de los negocios.&nbsp;&nbsp;</span></p><p><span style="color: black;"><span class="ql-cursor">﻿</span></span></p><p><span style="color: black;">Oficina en Santa Ponsa, con aparcamiento privado. Se recomienda acordar cita.&nbsp;</span></p>'
            ]
        ];
        return $config[$langId - 1];
    }

}
