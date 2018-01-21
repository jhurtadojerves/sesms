@extends('layouts.app')

@section('title', 'Agregar nueva carrera')

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
                            <li class="breadcrumb-item active" aria-current="page">Crear</li>
                        </ol>
                    </nav>

                    <div class="panel-body">
                        {!! Form::open(['method' => 'POST', 'route' => 'admin.careers.store']) !!}
                            {!! Field::text('code', ['required']) !!}
                            {!! Field::text('name', ['required']) !!}
                            {!! Field::date('foundation', ['required']) !!}
                            {!! Field::text('acronym', ['required']) !!}
                            {!! Field::select('id_school', $schools, ['required', 'class' => 'chosen-select']) !!}
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
        $('.chosen-select').chosen({
            width: "100%",
            placeholder_text_single: "Seleccionar una escuela"
        })
    </script>
@endsection
