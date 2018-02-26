@extends('layouts.app')

@section('title')
    Detalle de la asignatura {{ $syllable->ups->subject->name }}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <nav class="panel-heading" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('home') }}">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Coordinación Académica</li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('coordinator.index') }}">Periodos</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('coordinator.teacher.index', $period) }}">Docentes</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('coordinator.teacher.syllable', [$period, $user]) }}">{{ $user->name }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $syllable->ups->subject->string_level }} {{ $syllable->ups->parallel }} </li>
                        </ol>
                    </nav>

                    <div class="panel-body">
                        <h3>Unidades</h3>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Objetivo</th>
                                <th scope="col">Logros de Aprendizaje</th>
                                <th scope="col">Estrategia Metodológica</th>
                                <th scope="col">Recursos</th>
                                <th scope="col">Actividades en Clase</th>
                                <th scope="col">Actividades Autónomas</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($syllable->units as $unit)
                                <tr>
                                    <td><a href="{{ route('syllable.unit.show', [$syllable, $unit]) }}">{{ $unit->number }}</a></td>
                                    <td>{{ $unit->name }}</td>
                                    <td>{{ $unit->objetive }}</td>
                                    <td>{!! $unit->safeHTML($unit->achievement) !!}</td>
                                    <td>{!! $unit->safeHTML($unit->methodological_strategy) !!}</td>
                                    <td>{{ $unit->resources }}</td>
                                    <td>{{ $unit->classroom_activities }}</td>
                                    <td>{{ $unit->autonomous_activities }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <br><br><br>

                        <h3>Escenarios de Aprendizaje</h3>
                        <table class="table table-bordered">
                            <thead>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Tipo</th>

                            </thead>
                            <tbody>
                            @foreach($syllable->scenarios as  $stage)
                                <tr>
                                    <td>{{ $stage->id }}</td>
                                    <td>{{ $stage->name }}</td>
                                    <td>{{ $stage->type }}</td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <br><br><br>

                        <h3>Criterios de Evaluación</h3>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Actividad</th>
                                    <th scope="col">Primer Parcial</th>
                                    <th scope="col">Segundo Parcial</th>
                                    <th scope="col">Tercer Parcial</th>
                                    <th scope="col">Evaluación Principal</th>
                                    <th scope="col">Recuperación</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($syllable->evaluations as $evaluation)
                                    <tr>
                                        <td>{{ $evaluation->activity }}</td>
                                        <td>{{ $evaluation->first }}</td>
                                        <td>{{ $evaluation->second }}</td>
                                        <td>{{ $evaluation->third }}</td>
                                        <td>{{ $evaluation->principal }}</td>
                                        <td>{{ $evaluation->recovery }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br><br><br>

                        <h3>Bibliografía</h3>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Autor</th>
                                    <th scope="col">Título</th>
                                    <th scope="col">Lugar de Publicación</th>
                                    <th scope="col">Link</th>
                                    <th scope="col">ISBN</th>
                                    <th scope="col">Tipo</th>

                                </tr>
                            </thead>
                            <tbody>
                            @foreach($syllable->bibliographies as $bibliography)
                                <tr>
                                    <td>{{ $bibliography->id }}</td>
                                    <td>{{ $bibliography->author }}</td>
                                    <td>{{ $bibliography->title }}</td>
                                    <td>{{ $bibliography->publication_place }}</td>
                                    <td>{{ $bibliography->recovered }}</td>
                                    <td>{{ $bibliography->isbn }}</td>
                                    <td>{{ $bibliography->type }}</td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <br><br>

                        <h3>Comentario actual</h3>
                        <div>
                            {{ $syllable->comment or "No ha dejado ningún comentario" }}
                        </div>
                        <br><br>



                        {!! Form::open(['method' => 'POST', 'route' => ['coordinator.syllable.update', $period, $user, $syllable]]) !!}
                        {!! Field::textarea('comment', $syllable->comment, ['required']) !!}
                        @if($syllable->approved)
                            {!! Field::checkbox('approved', null, ['checked' => $period->status]) !!}
                        @else
                            {!! Field::checkbox('approved') !!}
                        @endif
                        {!! Form::submit('Dejar comentario', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
