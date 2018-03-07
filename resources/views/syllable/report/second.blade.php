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
    <section id="page-2-n">
    <span style="font-weight: bold;">2. Estructura y Desarrollo de la asignatura</span>

        @foreach($syllable->units as $unit)
            <table border="1" style="width: 90%;" class="units">

            </table>

            <table border=1 cellspacing=0 cellpadding=0>
                <tr>
                    <td width=227 colspan=2 valign=top style='width:170.05pt;border:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt'>
                        <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height: normal'><b><span lang=ES-EC>Unidad N° </span></b><span lang=ES-EC>{{ $unit->number }}</span></p>
                        <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height: normal'><span lang=ES-EC>&nbsp;</span></p>
                        <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height: normal'><b><span lang=ES-EC>Título de la Unidad: </span></b><span lang=ES-EC>{{ $unit->name }}</span></p>
                    </td>
                    <td width=340 colspan=3 valign=top style='width:254.65pt;border:solid windowtext 1.0pt; border-left:none;padding:0in 5.4pt 0in 5.4pt'>
                        <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height: normal'><b><span lang=ES-EC>OBJETIVO DE LA UNIDAD:</span></b></p>
                        <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height: normal'><span lang=ES-EC>&nbsp;</span></p>
                        <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height: normal'><span lang=ES-EC>{{ $unit->objetive }}</span></p>
                    </td>
                </tr>
                <tr>
                    <td width=103 rowspan=2 valign=top style='width:77.25pt;border:solid windowtext 1.0pt; border-top:none;padding:0in 5.4pt 0in 5.4pt'>
                        <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'><b><span lang=ES-EC>TEMAS Y SUBTEMAS</span></b></p>
                    </td>
                    <td width=124 rowspan=2 valign=top style='width:92.8pt;border-top:none; border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt'>
                        <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'><b><span lang=ES-EC>ESTRATEGIAS METODOLÓGICAS</span></b></p>
                    </td>
                    <td width=108 rowspan=2 valign=top style='width:81.2pt;border-top:none; border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt'>
                        <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'><b><span lang=ES-EC>RECURSOS</span></b></p>
                    </td>
                    <td width=231 colspan=2 valign=top style='width:173.45pt;border-top:none; border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt'>
                        <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height: normal'><b><span lang=ES-EC>ACTIVIDADES DE APRENDIZAJE</span></b></p>
                    </td>
                </tr>
                <tr>
                    <td width=115 valign=top style='width:85.9pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;   padding:0in 5.4pt 0in 5.4pt'>
                        <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'><b><span lang=ES-EC>En el Aula</span></b></p>
                    </td>
                    <td width=117 valign=top style='width:87.55pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt; padding:0in 5.4pt 0in 5.4pt'>
                        <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt; text-align:center;line-height:normal'><b><span lang=ES-EC>Autónomas</span></b></p>
                    </td>
                </tr>
                <tr>
                    <td width=103 valign=top style='width:77.25pt;border:solid windowtext 1.0pt; border-top:none;padding:0in 5.4pt 0in 5.4pt'>
                        <ol style="padding: 0; padding-left: 15px;">
                            @foreach($unit->topics as $topic)
                                <li style="padding: 0;">{{ $topic->name }}</li>
                                <p>{{ $topic->subtopics }}</p>
                            @endforeach
                        </ol>
                    </td>
                    <td width=124 valign=top style='width:92.8pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt'>
                        {!! $unit->safeHTML($unit->methodological_strategy) !!}
                    </td>
                    <td width=108 valign=top style='width:81.2pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt'>
                        <p>
                            {{ $unit->resources  }}
                        </p>
                    </td>
                    <td width=115 valign=top style='width:85.9pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0in 5.4pt 0in 5.4pt'>
                        <p>
                            {{ $unit->classroom_activities }}
                        </p>
                    </td>
                    <td width=117 valign=top style='width:87.55pt;border-top:none;border-left:  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;  padding:0in 5.4pt 0in 5.4pt'>
                        <p>
                            {{ $unit-> autonomous_activities }}
                        </p>
                    </td>
                </tr>
                <tr>
                    <td width=566 colspan=5 valign=top style='width:424.7pt;border:solid windowtext 1.0pt; border-top:none;padding:0in 5.4pt 0in 5.4pt'>
                        <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height: normal'><b><span lang=ES-EC>LOGROS DE APRENDIZAJE: </span></b><span lang=ES-EC>{{ $unit->achievement }}</span></p>
                        <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height: normal'><span lang=ES-EC>&nbsp;</span></p>
                    </td>
                </tr>
            </table>
            <br><br>
        @endforeach

    </section>
</body>
</html>