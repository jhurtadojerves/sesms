@extends('layouts.app')

@section('title', 'Añadir Referencia Bibliográfica')

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
                            <li class="breadcrumb-item active">Agregar Referencias</li>
                        </ol>
                    </nav>

                    <div class="panel-body">
                        {!! Form::open(['method' => 'POST', 'route' => ['syllable.bibliography.store', $syllable]]) !!}
                        {!! Field::text('title', ['required']) !!}
                        {!! Field::text('author') !!}
                        {!! Field::text('recovered_place') !!}
                        {!! Field::number('year') !!}
                        {!! Field::select('type', $bibliography_types, ['required']) !!}
                        {!! Field::select('format', $bibliography_format, ['required']) !!}
                        {!! Field::text('publication_place', ['required']) !!}

                        {!! Form::submit('Agregar', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.ckeditor.com/4.8.0/basic/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content')
    </script>
@endsection
