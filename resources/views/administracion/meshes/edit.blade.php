@extends('layouts.app')

@section('title', "Editar Malla Curricular - $mesh->name")

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <nav class="panel-heading" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('home') }}">Inicio</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.home') }}">Administración</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.meshes.index') }}">Mallas Curriculares</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Editar</li>
                        </ol>
                    </nav>

                    <div class="panel-body">
                        {!! Form::open(['method' => 'PUT', 'route' => ['admin.meshes.update', $mesh]]) !!}
                        {!! Field::text('code', $mesh->code, ['required'])  !!}
                        {!! Field::text('name', $mesh->name, ['required']) !!}
                        {!! Field::text('life', $mesh->life, ['required']) !!}
                        {!! Field::text('okay', $mesh->okay, ['required']) !!}
                        {!! Field::select('id_career', $careers, $mesh->career->id, ['required']) !!}
                        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection