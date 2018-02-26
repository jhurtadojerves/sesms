@extends('layouts.app')

@section('title')
    Editar sílabo {{ $syllable->name }}
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
                            <li class="breadcrumb-item active" aria-current="page">{{ $syllable->ups->subject->mesh->career->name }}</li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $syllable->ups->subject->name }}</li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('syllable.show', $syllable) }}">{{ $syllable->ups->subject->string_level }} {{ $syllable->ups->parallel }}</a></li>
                            <li class="breadcrumb-item active">Editar</li>
                        </ol>
                    </nav>

                    <div class="panel-body">
                        {!! Form::open(['method' => 'POST', 'route' => ['syllable.update', $syllable]]) !!}
                        {!! Field::text('sede', $syllable->sede, ['required'])  !!}
                        {!! Field::date('delivery', $syllable->delivery, ['required'])  !!}
                        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
