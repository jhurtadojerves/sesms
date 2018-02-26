@extends('layouts.app')

@section('title', 'Agrega nuevo docente')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <nav class="panel-heading" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('home') }}">Inicio</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.home') }}">Administración</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.periods.index') }}">Docentes</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Crear</li>
                        </ol>
                    </nav>

                    <div class="panel-body">
                        {!! Form::open(['method' => 'POST', 'route' => 'admin.teachers.store']) !!}
                            {!! Field::text('card', ['placeholder' => 'xxxxxxxxxx', 'required']) !!}
                            {!! Field::text('name', ['placeholder' => 'Ingresar el nombre del docente', 'required']) !!}
                            {!! Field::email('email', ['placeholder' => 'email@example.com', 'required']) !!}
                            {!! Field::select('gender', ['Male' => 'Masculino', 'Female' => 'Femenino', 'Other' => 'LGBTI+'], ['required']) !!}
                            {!! Field::text('phone', ['placeholder' => 'Ingresar número de teléfono', 'required']) !!}
                            {!! Field::text('cell_phone', ['placeholder' => 'Ingresar el número de celular', 'required']) !!}
                            {!! Field::password('password', ['placeholder' => '**********', 'required']) !!}
                            {!! Form::submit('Agregar', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
