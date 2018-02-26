@extends('layouts.app')

@section('title')
    Editar la unidad {{ $unit->name }}
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
                            <li class="breadcrumb-item active">Agregar Unidades</li>
                        </ol>
                    </nav>

                    <div class="panel-body">
                        {!! Form::open(['method' => 'POST', 'route' => ['syllable.unit.update', $syllable, $unit]]) !!}
                        {!! Field::text('name', $unit->name, ['required'])  !!}
                        {!! Field::text('objetive', $unit->objetive, ['required'])  !!}
                        {!! Field::textarea('achievement', $unit->achievement, ['required']) !!}
                        {!! Field::textarea('methodological_strategy', $unit->methodological_strategy, ['required']) !!}
                        {!! Field::textarea('resources', $unit->resources, ['required']) !!}
                        {!! Field::textarea('classroom_activities', $unit->classroom_activities, ['required']) !!}
                        {!! Field::textarea('autonomous_activities', $unit->autonomous_activities, ['required']) !!}

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
        CKEDITOR.replace('achievement')
        CKEDITOR.replace('methodological_strategy')
        CKEDITOR.replace('resources')
        CKEDITOR.replace('classroom_activities')
        CKEDITOR.replace('autonomous_activities')
    </script>
@endsection
