@extends('layouts.app')

@section('title', 'Agrega nuevo miembro del staff')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <nav class="panel-heading" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('home') }}">Inicio</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.home') }}">Administración</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.staff.index') }}">Staff</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Crear</li>
                        </ol>
                    </nav>

                    <div class="panel-body">
                        {!! Form::open(['method' => 'POST', 'route' => 'admin.staff.store']) !!}
                            {!! Field::select('position', $type_values, ['required']) !!}
                            {!! Field::select('user_id', $users, ['required', 'class' => 'chosen-select']) !!}
                            {!! Field::text('signature', ['placeholder' => 'Ingresar la firma que se mostrará en los reportes', 'required']) !!}
                            {!! Field::text('signature_position', ['placeholder' => 'Ingresar como se verá el cargo del staff en la firma', 'required']) !!}
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
            placeholder_text_single: "Selecciona un docente"
        })
    </script>
@endsection
