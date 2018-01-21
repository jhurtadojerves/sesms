@extends('layouts.app')

@section('title', "Editar la carrera $career->name")

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <nav class="panel-heading" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('home') }}">Inicio</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.home') }}">Administración</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.careers.index') }}">Carreras</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Editar</li>
                        </ol>
                    </nav>

                    <div class="panel-body">
                        {!! Form::open(['method' => 'PUT', 'route' => ['admin.careers.update', $career]]) !!}
                            {!! Field::text('code', $career->code, ['required']) !!}
                            {!! Field::text('name', $career->name, ['required']) !!}
                            {!! Field::date('foundation', $career->foundation, ['required']) !!}
                            {!! Field::text('acronym', $career->acronym, ['required']) !!}
                            {!! Field::select('id_school', $schools, $career->school->id, ['required', 'class' => 'chosen-select']) !!}
                            {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $('.chosen-select').chosen({
            width: "100%"
        })
    </script>
@endsection