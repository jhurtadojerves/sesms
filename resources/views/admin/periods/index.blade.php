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
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.home') }}">Administración</a></li>
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
                                <th scope="col">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($periods as $period)
                                <tr>
                                    <th scope="row">{{ $period->id }}</th>
                                    <td>{{ $period->name }}</td>
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
                                    <td class="text-center">
                                        <a href="{{ route('admin.periods.edit', $period) }}" title="Editar">
                                            <i class="fa fa-2x fa-pencil-square-o" style="color: green;" aria-hidden="true"></i>
                                        </a>
                                        <a class="link-eliminar" href="{{ route('admin.periods.destroy', $period) }}" title="Eliminar" onclick="return confirm('¿Estás seguro de querer eliminar el Periodo Académico')">
                                            <i class="fa fa-2x fa-trash-o" style="color: red;" aria-hidden="true"></i>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <a type="button" class="btn btn-primary" href="{{ route('admin.periods.soap') }}">Obtener Periodo Actual</a><br><br><a type="button" class="btn btn-primary" href="{{ route('admin.periods.create') }}">Agregar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
