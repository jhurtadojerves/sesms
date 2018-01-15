@extends('layouts.app')

@section('title', "Agregar Asignatura a la Malla Curricular $mesh->name")

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
                            <li class="breadcrumb-item active" aria-current="page">Crear</li>
                        </ol>
                    </nav>

                    <div class="panel-body">
                        {!! Form::open(['method' => 'POST', 'route' => ['admin.meshes.subjects.store', $mesh]]) !!}
                            {!! Field::text('code', ['required'])  !!}
                            {!! Field::text('name', ['required']) !!}
                            {!! Field::number('hp', ['required']) !!}
                            {!! Field::number('ha', ['required']) !!}
                            {!! Field::number('ht', ['required']) !!}
                            {!! Field::number('credits', ['required']) !!}
                            {!! Field::text('prerequisites') !!}
                            {!! Field::text('corequisites') !!}
                            {!! Field::number('level', ['required']) !!}
                            {!! Form::submit('Agregar', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
