@extends('layouts.app')

@section('title', 'Añadir Actividad de Evaluación')

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
                            <li class="breadcrumb-item active">Evaluaciones</li>
                            <li class="breadcrumb-item active">Agregar</li>
                        </ol>
                    </nav>

                    <div class="panel-body">
                        {!! Form::open(['method' => 'POST', 'route' => ['syllable.evaluation.store', $syllable]]) !!}
                        {!! Field::select('activity', $activities_names, ['required', 'class' => 'chosen']) !!}
                        {!! Field::number('first', 0, ['min' => 0]) !!}
                        {!! Field::number('second', 0, ['min' => 0]) !!}
                        {!! Field::number('third', 0, ['min' => 0]) !!}
                        {!! Field::number('principal', 0, ['min' => 0]) !!}
                        {!! Field::number('recovery', 0, ['min' => 0]) !!}

                        {!! Form::submit('Agregar', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('.chosen').chosen({
            width: "100%",
            placeholder_text_single: "Seleccionar una escuela"
        })
    </script>
@endsection
