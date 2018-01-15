@extends('layouts.app')

@section('title', "Módulo de Administración")

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <nav class="panel-heading" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('home') }}">Inicio</a></li>
                        <li class="breadcrumb-item" aria-current="page">Administración</li>
                    </ol>
                </nav>

                <div class="panel-body">
                <ul>
                    <li><a href="{{ route('admin.periods.index') }}">Periodo Académico</a></li>
                    <li><a href="{{ route('admin.faculties.index') }}">Facultades</a></li>
                    <li><a href="{{ route('admin.schools.index') }}">Escuelas</a></li>
                    <li><a href="{{ route('admin.careers.index') }}">Carreras</a></li>
                    <li><a href="{{ route('admin.meshes.index') }}">Mallas Curriculares</a></li>
                </ul>

                    <ul>
                        <li><a href="{{ route('admin.teachers.index') }}">Docentes</a></li>
                    </ul>
                    
                <ul>
                    <li><a href="{{ route('syllable.index') }}">Ver sílabos</a></li>
                </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
