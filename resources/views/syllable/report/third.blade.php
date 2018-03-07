<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $syllable->ups->subject->name }} - {{ $syllable->ups->user->card }}</title>
    {!! Html::style('css/app.css') !!}

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        /* cyrillic */
        @font-face {
            font-family: 'Playfair Display';
            font-style: normal;
            font-weight: 400;
            src: local('Playfair Display Regular'), local('PlayfairDisplay-Regular'), url(https://fonts.gstatic.com/s/playfairdisplay/v13/nuFiD-vYSZviVYUb_rj3ij__anPXDTjYgFE_.woff2) format('woff2');
            unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
        }
        /* vietnamese */
        @font-face {
            font-family: 'Playfair Display';
            font-style: normal;
            font-weight: 400;
            src: local('Playfair Display Regular'), local('PlayfairDisplay-Regular'), url(https://fonts.gstatic.com/s/playfairdisplay/v13/nuFiD-vYSZviVYUb_rj3ij__anPXDTPYgFE_.woff2) format('woff2');
            unicode-range: U+0102-0103, U+0110-0111, U+1EA0-1EF9, U+20AB;
        }
        /* latin-ext */
        @font-face {
            font-family: 'Playfair Display';
            font-style: normal;
            font-weight: 400;
            src: local('Playfair Display Regular'), local('PlayfairDisplay-Regular'), url(https://fonts.gstatic.com/s/playfairdisplay/v13/nuFiD-vYSZviVYUb_rj3ij__anPXDTLYgFE_.woff2) format('woff2');
            unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
        }
        /* latin */
        @font-face {
            font-family: 'Playfair Display';
            font-style: normal;
            font-weight: 400;
            src: local('Playfair Display Regular'), local('PlayfairDisplay-Regular'), url(https://fonts.gstatic.com/s/playfairdisplay/v13/nuFiD-vYSZviVYUb_rj3ij__anPXDTzYgA.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
        }

        /*.units {
            margin-bottom: 100px;
        }*/

        * {
            font-family: 'Playfair Display', serif !important;
        }
        .units:first-child {
            page-break-after: avoid;
        }
        td {
            padding: 5px;
        }
        .page-break {
            page-break-after: always;
        }
        .uppercase {
            text-transform: uppercase;
        }
        footer .pagenum:before {
            content: counter(page);
        }
        footer {
            position: fixed;
            bottom: 120px;
            right: 0px;
            text-align: right;
            width: 75%;
            font-size: 10px;
        }
        footer h1 {
            color: black !important;
        }
    </style>
</head>
<body style="background: transparent; color: black;">

    <section class="page-n-1">
        <span style="font-weight: bold;">3. Escenario de aprendizaje</span>
        <table border="1" style="width: 100%;">
            <tr>
                <td><b>REALES</b></td>
                <td><b>VIRTUALES</b></td>
                <td><b>AÚLICAS</b></td>
            </tr>
            @for($i = 0; $i < $size; $i++)
                <tr>
                    <td>{{ $real[$i]->name or "" }}</td>
                    <td>{{ $virtual[$i]->name or "" }}</td>
                    <td>{{ $aulico[$i]->name or "" }}</td>
                </tr>
            @endfor

        </table>
        <br><br>
        <span style="font-weight: bold;">4. Criterios normativos para la evaluación de la asignatura</span>
        <table border="1" style="width: 100%;">
            <tr>
                <td><b>ACTIVIDADES A EVALUAR</b></td>
                <td><b>PRIMER PARCIAL</b></td>
                <td><b>SEGUNDO PARCIAL</b></td>
                <td><b>TERCER PARCIAL</b></td>
                <td><b>EVALUACIÓN PRINCIPAL</b></td>
                <td><b>RECUPERACIÓN</b></td>
            </tr>

            @foreach($syllable->evaluations as $evaluation)
                <tr style="text-align: center;">
                    <td><b>{{ $evaluation->activity }}</b></td>
                    <td>{{ $evaluation->first }}</td>
                    <td>{{ $evaluation->second }}</td>
                    <td>{{ $evaluation->third }}</td>
                    <td>{{ $evaluation->principal }}</td>
                    <td>{{ $evaluation->recovery }}</td>
                </tr>
            @endforeach

        </table>
        <br><br>
        <span style="font-weight: bold;">5. Bibliografía básica y complementaria</span>
        <table border="1" style="width: 100%;">
            <tr><td><b>BÁSICA</b></td></tr>
            <tr>
                <td>
                    @foreach($syllable->bibliographies as $bibliography)
                        @if($bibliography->type == 'basic')
                            @if($bibliography->format == 'apa')
                                <p>{{ $bibliography->author }}. ({{ $bibliography->year }}). <i>{{ $bibliography->title }}</i>. {{ $bibliography->publication_place }}: Editorial
                                @if($bibliography->recovered)
                                    Recuperado de:  {{ $bibliography->recovered }}
                                @endif
                            </p>
                            @else
                                <p>{{ strtoupper($bibliography->author) }}. <i>{{ $bibliography->title }}</i>. {{ $bibliography->publication_place }}: Editorial. {{ $bibliography->year }}.
                                    @if($bibliography->isbn)
                                        ISBN: {{ $bibliography->isbn }}.
                                    @endif
                                    @if($bibliography->recovered)
                                        Disponible en:  {{ $bibliography->recovered }}
                                    @endif
                                </p>
                            @endif
                            <br>
                        @endif
                    @endforeach
                </td>
            </tr>
            <tr><td><b>COMPLEMENTARIA</b></td></tr>
            <tr>
                <td>
                    @foreach($syllable->bibliographies as $bibliography)
                        @if($bibliography->type == 'complementary')
                            @if($bibliography->format == 'apa')
                                <p>{{ $bibliography->author }}. ({{ $bibliography->year }}). <i>{{ $bibliography->title }}</i>. {{ $bibliography->publication_place }}: Editorial
                                    @if($bibliography->recovered)
                                        Recuperado de:  {{ $bibliography->recovered }}
                                    @endif
                                </p>
                            @else
                                <p>{{ strtoupper($bibliography->author) }}. <i>{{ $bibliography->title }}</i>. {{ $bibliography->publication_place }}: Editorial. {{ $bibliography->year }}.
                                    @if($bibliography->isbn)
                                        ISBN: {{ $bibliography->isbn }}.
                                    @endif
                                    @if($bibliography->recovered)
                                        Disponible en:  {{ $bibliography->recovered }}
                                    @endif
                                </p>
                            @endif
                                <br>
                        @endif
                    @endforeach
                </td>
            </tr>
        </table>
        <br><br>
        <span style="font-weight: bold;"> 6. Perfil del profesor que imparte la asignatura</span>
        <table border="1" style="width: 100%;">
            <tr>
                <td><b>NOMBRE DEL PROFESOR</b></td>
                <td>{{ strtoupper($syllable->ups->user->name) }}</td>
            </tr>
            <tr>
                <td><b>NÚMERO TELEFÓNICO</b></td>
                <td>{{ $syllable->ups->user->cell_phone }}</td>
            </tr>
            <tr>
                <td><b>CORREO ELECTRÓNICO</b></td>
                <td>{{ $syllable->ups->user->email }}</td>
            </tr>
            <tr>
                <td><b>TÍTULOS ACADÉMICOS DE TERCER <br> NIVEL</b></td>
                <td>--</td>
            </tr>
            <tr>
                <td><b>TÍTULOS ACADÉMICOS DE <br>POSGRADO</b></td>
                <td>--</td>
            </tr>
        </table>
        <br><br><br><br>
        <table style="width: 100%; text-align: center;">
            <tr>
                <td>
                    {{ $syllable->ups->user->signature }}<br>
                    <b>PROFESOR DE LA <br>
                        ASIGNATURA</b>
                </td>
                <td>
                    {{ $coordinator->signature }} <br>
                    <b>{{ $coordinator->signature_position }}</b>
                </td>
            </tr>
        </table>
        <br><br><br><br>
        <table style="width: 100%; text-align: center;">
            <tr>
                <td>
                    {{ $director->signature }} <br>
                    <b>{{ $director->signature_position }}</b>
                </td>
            </tr>
        </table>
        <br><br><br><br>
        <b>FECHA DE PRESENTACIÓN: </b> {{ $syllable->delivery }}
        
    </section>

</body>
</html>