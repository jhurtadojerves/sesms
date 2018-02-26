@extends('layouts.app')

@section('title', 'Periodos Académicos')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <nav class="panel-heading" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('home') }}">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Coordinación Académica</li>
                            <li class="breadcrumb-item active" aria-current="page">Periodos</li>
                        </ol>
                    </nav>

                    <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Fecha de Inciio</th>
                                <th scope="col">Fecha de Finalización</th>
                                <th scope="col">Estado</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($periods as $period)
                                <tr>
                                    <th scope="row">{{ $period->id }}</th>
                                    <td><a href="{{ route('coordinator.teacher.index', $period) }}">{{ $period->name }}</a></td>
                                    <td>{{ $period->star }}</td>
                                    <td>{{ $period->end }}</td>
                                    <td>
                                        <div class="text-center">
                                            @if($period->status == 1)
                                                <i class="fa fa-2x fa-check-circle" style="color: green;" aria-hidden="true" title="Periodo Actual"></i>
                                            @else
                                                <i class="fa fa-2x fa-times" style="color: red;" aria-hidden="true" title="Periodo Anterior"></i>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
