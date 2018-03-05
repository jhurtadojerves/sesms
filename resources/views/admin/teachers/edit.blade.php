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
                            <li class="breadcrumb-item active" aria-current="page">{{ $user->name }}</li>
                            <li class="breadcrumb-item active" aria-current="page">Editar</li>
                        </ol>
                    </nav>

                    <div class="panel-body">
                        {!! Form::open(['method' => 'POST', 'route' => ['admin.teachers.update', $user]]) !!}
                            {!! Field::text('card', $user->card, ['placeholder' => 'xxxxxxxxxx', 'required']) !!}
                            {!! Field::text('name', $user->name, ['placeholder' => 'Ingresar el nombre del docente', 'required']) !!}
                            {!! Field::email('email', $user->email, ['placeholder' => 'email@example.com', 'required']) !!}
                            {!! Field::select('gender', ['Male' => 'Masculino', 'Female' => 'Femenino', 'Other' => 'LGBTI+'], $user->gender, ['required']) !!}
                            {!! Field::text('phone', $user->phone, ['placeholder' => 'Ingresar número de teléfono', 'required']) !!}
                            {!! Field::text('cell_phone', $user->cell_phone, ['placeholder' => 'Ingresar el número de celular', 'required']) !!}

                            {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
