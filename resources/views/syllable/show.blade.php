@extends('layouts.app')

@section('title')
    Unidades de la asignatura {{ $syllable->ups->subject->name }}
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
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.meshes.index') }}">Mallas Curriculares</a></li>

                            <li class="breadcrumb-item active" aria-current="page">{{ $syllable->ups->subject->name }}</li>
                        </ol>
                    </nav>

                    <div class="panel-body">
                        <h1>{{ $syllable->ups->subject->name }} - Unidades</h1>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
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
                                    <td><a href="{{ route('syllable.unit.show', [$syllable, $unit]) }}">{{ $unit->name }}</a></td>
                                    <td>{{ $unit->objetive }}</td>
                                    <td>{{ $unit->achievement }}</td>
                                    <td>{{ $unit->methodological_strategy }}</td>
                                    <td>{{ $unit->resources }}</td>
                                    <td>{{ $unit->classroom_activities }}</td>
                                    <td>{{ $unit->autonomous_activities }}</td>
                                    <td class="text-center">
                                        <a href="#" title="Editar">
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

                        <a type="button" class="btn btn-primary" href="{{ route('syllable.unit.create', $syllable) }}">Agregar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
