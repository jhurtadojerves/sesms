@extends('layouts.app')

@section('title', 'Listado de Sílabos del Docente')

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
                            <li class="breadcrumb-item active" aria-current="page">{{ $user->name }}</li>
                        </ol>
                    </nav>

                    <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Asignatura</th>
                            <th scope="col">Nivel</th>
                            <th scope="col">Carrera</th>
                            <th scope="col">Paralelo</th>
                            <th scope="col">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($syllables as $syllable)
                            <tr>
                                <td><a href="{{ route('coordinator.syllable.show', [$period, $user, $syllable]) }}">{{ $syllable->id }}</a></td>
                                <td><a href="{{ route('coordinator.syllable.show', [$period, $user, $syllable]) }}">{{ $syllable->ups->subject->name }}</a></td>
                                <td>{{ $syllable->ups->subject->string_level }}</td>
                                <td>{{ $syllable->ups->subject->mesh->career->name }}</td>
                                <td>{{ $syllable->ups->parallel }}</td>
                                <td class="text-center">
                                    @if($syllable->approved or Auth::user()->type == 'coordinator')
                                        <a href="{{ route('syllable.print', $syllable) }}" title="Imprimir">
                                            <i class="fa fa-2x fa-file-pdf-o" aria-hidden="true"></i>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
