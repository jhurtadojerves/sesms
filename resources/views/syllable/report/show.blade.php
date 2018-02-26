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

    <section id="page-1">
        <table>
            <tr>
                <td><img src="pdf/images/logo.jpg" width="65px"></td>
                <td style="text-align: center;">
                    <h4><b>ESCUELA SUPERIOR POLITÉCTINA DE CHIMBORAZO</b></h4>
                    <h5>VICERRECTORADO ACADÉMICO <br>
                    DIRECCIÓN DE DESARROLLO ACADÉMICO</h5>
                </td>
                <td>
                    @if($syllable->ups->subject->mesh->career->school->faculty->acronym == 'FIE' or $syllable->ups->subject->mesh->career->school->faculty->acronym == 'FRN')
                        <img src="pdf/images/{{ $syllable->ups->subject->mesh->career->school->faculty->acronym }}.png" width="110px">
                    @else
                        <img src="pdf/images/{{ $syllable->ups->subject->mesh->career->school->faculty->acronym }}.png" width="65px">
                    @endif
                </td>
            </tr>
        </table>
        <br>
        <h5 style="text-align: center;"><b>SÍLABO</b></h5>


        <span style="font-weight: bold;">1. Datos Generales y Específicos de la Asignatura</span>
        <br><br>
        <table cellspacing="25" cellpadding="25" border="1" style="width: 80%; margin: auto auto;">
            <tr class="uppercase">
                <td><b>FACULTAD</b></td>
                <td colspan="2">{{ $syllable->ups->subject->mesh->career->school->faculty->name }}</td>
            </tr>

            <tr class="uppercase">
                <td><b>ESCUELA</b></td>
                <td colspan="2">{{ $syllable->ups->subject->mesh->career->school->name }}</td>
            </tr>

            <tr class="uppercase">
                <td><b>CARRERA</b></td>
                <td colspan="2">{{ $syllable->ups->subject->mesh->career->name }}</td>
            </tr>

            <tr class="uppercase">
                <td><b>SEDE</b></td>
                <td colspan="2">MORONA SANTIAGO</td>
            </tr>

            <tr class="uppercase">
                <td><b>MODALIDAD</b></td>
                <td colspan="2">PRESENCIAL</td>
            </tr>

            <tr class="uppercase">
                <td><b>ASIGNATURA</b></td>
                <td colspan="2">{{ $syllable->ups->subject->name }}</td>
            </tr>

            <tr class="uppercase">
                <td><b>CARRERA</b></td>
                <td colspan="2">{{ $syllable->ups->subject->mesh->career->name }}</td>
            </tr>

            <tr class="uppercase">
                <td><b>NIVEL</b></td>
                <td colspan="2">{{ $syllable->ups->subject->string_level }}</td>
            </tr>

            <tr class="uppercase">
                <td width="33%"><b>PERÍODO ACADÉMICO</b></td>
                <td colspan="2">{{ $syllable->ups->period->name }}</td>
            </tr>

            <tr style="text-align: center;">
                <td><b>CAMPO DE FORMACIÓN</b></td>
                <td><b>CÓDIGO</b></td></td>
                <td><b>TOTAL HORAS</b></td>
            </tr>

            <tr class="uppercase" style="text-align: center;">
                <td width="33%">{{ $syllable->ups->subject->training_field }}</td>
                <td>{{ $syllable->ups->subject->code }}</td>
                <td>{{ $syllable->ups->subject->ht * 16 }}</td>
            </tr>

            <tr style="text-align: center;">
                <td><b>NÚMERO DE HORAS SEMANAL</b></td>
                <td><b>COREQUISITOS</b></td></td>
                <td><b>PREREQUISITOS</b></td>
            </tr>

            <tr class="uppercase" style="text-align: center;">
                <td width="33%">{{ $syllable->ups->subject->ht }}</td>
                <td>{{ $syllable->ups->subject->prerequisites ? $syllable->ups->subject->prerequisites : '--'}} </td>
                <td>{{ $syllable->ups->subject->corequisites ? $syllable->ups->subject->corequisites : '--'}}</td>
            </tr>

        </table>



        <footer>
            <hr style="color: black;">
            <span>Dirección: Don Bosco y José Félix Pintado (Detrás del Estadio Tito Navarrete Álava)</span> <br>
            <span>Teléfono: 593 (03) 2998-200 Ext 251.   Código Postal: EC060155</span> <br>
            <span style="text-align: left !important;">www.espoch.edu.ec</span>
            <span>Macas - Ecuador</span>
        </footer>

    </section>

    <div class="page-break"></div>
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
    <div class="page-break"></div>

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
                <td>Ing. Ángel Flores Mgs.<br>
                    <b>COORDINADOR<br>
                        ACADÉMICO</b></td>
            </tr>
        </table>
        <br><br><br><br>
        <table style="width: 100%; text-align: center;">
            <tr>
                <td>
                    Ing. Romané Peñafiel Mgs. <br>
                    <b>DIRECTORA DE LA <br>EXTENSIÓN</b>
                </td>
            </tr>
        </table>
        <br><br><br><br>
        <b>FECHA DE PRESENTACIÓN: </b> {{ $syllable->delivery }}
        
    </section>

</body>
</html>