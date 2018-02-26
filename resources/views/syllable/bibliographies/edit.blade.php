@extends('layouts.app')

@section('title', 'Editar Referencia Bibliográfica')

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
                            <li class="breadcrumb-item active">Editar Referencia</li>
                        </ol>
                    </nav>

                    <div class="panel-body">
                        {!! Form::open(['method' => 'POST', 'route' => ['syllable.bibliography.edit', $syllable, $bibliography]]) !!}
                        {!! Field::text('title', $bibliography->title, ['required']) !!}
                        {!! Field::text('author', $bibliography->author) !!}
                        {!! Field::text('recovered_place', $bibliography->recovered_place) !!}
                        {!! Field::number('year', $bibliography->year) !!}
                        {!! Field::select('type', $bibliography_types,  $bibliography->type, ['required']) !!}
                        {!! Field::select('format', $bibliography_format, $bibliography->format, ['required']) !!}
                        {!! Field::text('publication_place', $bibliography->publication_place, ['required']) !!}

                        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
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
