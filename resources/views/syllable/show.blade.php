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
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('syllable.index') }}">Sílabos</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $syllable->ups->subject->mesh->career->name }}</li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $syllable->ups->subject->name }}</li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $syllable->ups->subject->string_level }} {{ $syllable->ups->parallel }} </li>
                        </ol>
                    </nav>

                    <div class="panel-body">
                        <h3>Unidades</h3>
                        <table class="table table-bordered table-responsive">
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
                                <th scope="col">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($syllable->units as $unit)
                                <tr>
                                    <td><a href="{{ route('syllable.unit.show', [$syllable, $unit]) }}">{{ $unit->number }}</a></td>
                                    <td><a href="{{ route('syllable.unit.show', [$syllable, $unit]) }}">{{ $unit->name }}</a></td>
                                    <td>{{ $unit->objetive }}</td>
                                    <td>{!! $unit->safeHTML($unit->achievement) !!}</td>
                                    <td>{!! $unit->safeHTML($unit->methodological_strategy) !!}</td>
                                    <td>{{ $unit->resources }}</td>
                                    <td>{{ $unit->classroom_activities }}</td>
                                    <td>{{ $unit->autonomous_activities }}</td>
                                    <td  width="10%" class="text-center">
                                        <a href="{{ route('syllable.unit.show', [$syllable, $unit]) }}" title="Ver más">
                                            <i class="fa fa-2x fa-plus" style="color: dodgerblue;" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('syllable.unit.edit', [$syllable, $unit]) }}" title="Editar">
                                            <i class="fa fa-2x fa-pencil-square-o" style="color: green;" aria-hidden="true"></i>
                                        </a>
                                        <a class="link-eliminar" href="{{ route('syllable.unit.destroy', [$syllable, $unit]) }}" title="Eliminar" onclick="return confirm('¿Estás seguro de querer eliminar la unidad?')">
                                            <i class="fa fa-2x fa-trash-o" style="color: red;" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <a type="button" class="btn btn-primary" href="{{ route('syllable.unit.create', $syllable) }}">Añadir Unidad</a>
                        <br><br><br>

                        <h3>Escenarios de Aprendizaje</h3>
                        <table class="table table-bordered">
                            <thead>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Acciones</th>
                            </thead>
                            <tbody>
                            @foreach($syllable->scenarios as  $stage)
                                <tr>
                                    <td>{{ $stage->id }}</td>
                                    <td>{{ $stage->name }}</td>
                                    <td>{{ $stage->type }}</td>
                                    <td><a href="{{ route('syllable.scenario.edit', [$syllable, $stage]) }}" title="Editar">
                                            <i class="fa fa-2x fa-pencil-square-o" style="color: green;" aria-hidden="true"></i>
                                        </a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <a type="button" class="btn btn-primary" href="{{ route('syllable.scenario.create', $syllable) }}">Añadir Escenario</a>
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
                                    <th scope="col">Acciones</th>
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
                                        <td>
                                            <a href="{{ route('syllable.evaluation.edit', [$syllable, $evaluation]) }}" title="Editar">
                                                <i class="fa fa-2x fa-pencil-square-o" style="color: green;" aria-hidden="true"></i>
                                            </a>
                                            <a class="link-eliminar" href="#" title="Eliminar" onclick="return confirm('¿Estás seguro de querer eliminar la Malla Curricular?')">
                                                <i class="fa fa-2x fa-trash-o" style="color: red;" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a type="button" class="btn btn-primary" href="{{ route('syllable.evaluation.create', $syllable) }}">Añadir Evaluación</a>
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
                                    <th scope="col">Acciones</th>
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
                                    <td class="text-center">
                                        <a href="{{ route('syllable.bibliography.edit', [$syllable, $bibliography]) }}" title="Editar">
                                            <i class="fa fa-2x fa-pencil-square-o" style="color: green;" aria-hidden="true"></i>
                                        </a>
                                        <a class="link-eliminar" href="#" title="Eliminar" onclick="return confirm('¿Estás seguro de querer eliminar la Malla Curricular?')">
                                            <i class="fa fa-2x fa-trash-o" style="color: red;" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <a type="button" class="btn btn-primary" href="{{ route('syllable.bibliography.create', $syllable) }}">Añadir Bibliografía</a>
                        <br><br><br>
                        @if($syllable->comment)
                            <h3>Comentario del Coodinador</h3>
                            <div>{{ $syllable->comment }}</div>
                            <br><br>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
