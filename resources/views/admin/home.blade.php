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
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-2">
                            <img src="images/llama.png" alt="" class="img-fluid">
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-2">
                            <div class="list-group">
                                <a href="{{ route('admin.periods.index') }}" class="list-group-item list-group-item-action">Periodo Académico</a>
                                <a href="{{ route('admin.faculties.index') }}" class="list-group-item list-group-item-action">Facultades</a>
                                <a href="{{ route('admin.schools.index') }}" class="list-group-item list-group-item-action">Escuelas</a>
                                <a href="{{ route('admin.careers.index') }}" class="list-group-item list-group-item-action">Carreras</a>
                                <a href="{{ route('admin.meshes.index') }}" class="list-group-item list-group-item-action">Mallas Curriculares</a>
                                <a href="{{ route('admin.teachers.index') }}" class="list-group-item list-group-item-action">Docentes</a>
                                <a href="{{ route('admin.staff.index') }}" class="list-group-item list-group-item-action">Administrativos</a>

                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
