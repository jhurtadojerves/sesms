@extends('layouts.app')

@section('title')
    Editar Escenario de Aprendizaje {{ $stage->name }}
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
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('syllable.show', $syllable->id) }}">{{ $syllable->ups->subject->name }}</a></li>
                            <li class="breadcrumb-item active">Escenarios de Aprendizaje</li>
                            <li class="breadcrumb-item active">Editar {{ $stage->name }}</li>
                        </ol>
                    </nav>

                    <div class="panel-body">
                        {!! Form::open(['method' => 'POST', 'route' => ['syllable.scenario.update', $syllable, $stage]]) !!}
                        {!! Field::text('name', $stage->name, ['required']) !!}
                        {!! Field::select('type', $stage_types, $stage->type, ['required']) !!}
                        {!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
