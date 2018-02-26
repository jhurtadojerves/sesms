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
                        {!! Field::text('activity', $evaluation->activity, ['required']) !!}
                        {!! Field::number('first', $evaluation->first) !!}
                        {!! Field::number('second', $evaluation->second) !!}
                        {!! Field::number('third', $evaluation->third) !!}
                        {!! Field::number('principal', $evaluation->principal) !!}
                        {!! Field::number('recovery', $evaluation->recovery) !!}

                        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
