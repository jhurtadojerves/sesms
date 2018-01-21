@extends('layouts.app')

@section('title', 'Editar Periodo Académico')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <nav class="panel-heading" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('home') }}">Inicio</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.home') }}">Administración</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.periods.index') }}">Periodos</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Editar</li>
                        </ol>
                    </nav>

                    <div class="panel-body">
                        {!! Form::open(['method' => 'PUT', 'route' => ['admin.periods.update', $period], ]) !!}
                            {!! Field::text('name', $period->name) !!}
                            {!! Field::date('star', $period->star) !!}
                            {!! Field::date('end', $period->end) !!}
                            @if($period->status)
                                {!! Field::checkbox('status', null, ['checked' => $period->status]) !!}
                            @else
                                {!! Field::checkbox('status') !!}
                            @endif
                            {!! Form::submit('Agregar', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
