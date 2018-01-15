@extends('layouts.app')

@section('title', "Escuela de $school->name")

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <nav class="panel-heading" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('home') }}">Inicio</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="#">Administración</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.schools.index') }}">Escuelas</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Editar</li>
                        </ol>
                    </nav>

                    <div class="panel-body">
                        {!! Form::open(['method' => 'PUT', 'route' => ['admin.schools.update',$school ]]) !!}
                            {!! Field::text('code', $school->code, ['required']) !!}
                            {!! Field::text('name', $school->name, ['required']) !!}
                            {!! Field::date('foundation', $school->foundation, ['required']) !!}
                            {!! Field::text('acronym', $school->acronym, ['required']) !!}
                            {!! Field::select('id_faculty', $faculties, $school->faculty->id, ['required']) !!}
                            {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
