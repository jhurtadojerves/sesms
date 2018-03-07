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

</body>
</html>