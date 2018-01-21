@extends('layouts.app')

@section('title', "Editar Facultad - $faculty->name")

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <nav class="panel-heading" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('home') }}">Inicio</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.home') }}">Administración</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.faculties.index') }}">Facultades</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Editar</li>
                        </ol>
                    </nav>

                    <div class="panel-body">
                        {!! Form::open(['method' => 'PUT', 'route' => ['admin.faculties.update', $faculty]]) !!}
                            {!! Field::text('code', $faculty->code, ['required']) !!}
                            {!! Field::text('name', $faculty->name, ['required']) !!}
                            {!! Field::date('foundation', $faculty->foundation, ['required']) !!}
                            {!! Field::text('acronym', $faculty->acronym, ['required']) !!}
                            {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                            <a href="{{ route('admin.faculties.index') }}" type="button" class="btn btn-danger">Cancelar</a>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
