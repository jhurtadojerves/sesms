@extends('layouts.app')

@section('title', "Editar actividad $evaluation->activity")

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
                            <li class="breadcrumb-item active">Editar</li>
                            <li class="breadcrumb-item active">{{ $evaluation->activity }}</li>
                        </ol>
                    </nav>

                    <div class="panel-body">
                        {!! Form::open(['method' => 'POST', 'route' => ['syllable.evaluation.update', $syllable, $evaluation]]) !!}
                        {!! Field::number('first', $evaluation->first, ['min' => 0]) !!}
                        {!! Field::number('second', $evaluation->second, ['min' => 0]) !!}
                        {!! Field::number('third', $evaluation->third, ['min' => 0]) !!}
                        {!! Field::number('principal', $evaluation->principal, ['min' => 0]) !!}
                        {!! Field::number('recovery', $evaluation->recovery, ['min' => 0]) !!}

                        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
