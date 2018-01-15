@extends('layouts.app')

@section('title', 'Añadir Unidad')

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
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('syllable.show', $syllable->id) }}">{{ $syllable->ups->subject->name }}</a></li>
                            <li class="breadcrumb-item active">Agregar Unidades</li>
                        </ol>
                    </nav>

                    <div class="panel-body">
                        {!! Form::open(['method' => 'POST', 'route' => ['syllable.unit.store', $syllable]]) !!}
                        {!! Field::text('name', ['required'])  !!}
                        {!! Field::text('objetive', ['required'])  !!}
                        {!! Field::textarea('achievement', ['required']) !!}
                        {!! Field::textarea('methodological_strategy', ['required']) !!}
                        {!! Field::textarea('resources', ['required']) !!}
                        {!! Field::textarea('classroom_activities', ['required']) !!}
                        {!! Field::textarea('autonomous_activities', ['required']) !!}

                        {!! Form::submit('Agregar', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
