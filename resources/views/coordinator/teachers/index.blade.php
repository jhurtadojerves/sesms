@extends('layouts.app')

@section('title', 'Docentes')

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
                            <li class="breadcrumb-item active" aria-current="page">Docentes</li>
                        </ol>
                    </nav>

                    <div class="panel-body">
                        <h4>Docentes Registrados Periodo Académico {{ $period->name }}</h4>
                        <h5>Selecione un docente para listar las asignaturas en el presente periodo académico</h5>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">Cédula</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Email</th>
                                <th scope="col">Género</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($teachers as $teacher)
                                <tr>
                                    <td><a href="{{route('coordinator.teacher.syllable', [$period, $teacher])}}">{{ $teacher->card }}</a></td>
                                    <td>{{ $teacher->name }}</td>
                                    <td>{{ $teacher->email }}</td>
                                    <td>{{ $teacher->gender }}</td>
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
