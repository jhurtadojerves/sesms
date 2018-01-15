@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <nav class="panel-heading" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('home') }}">Inicio</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.home') }}">Administración</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Facultades</li>
                        </ol>
                    </nav>

                    <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">Código</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Fundación</th>
                                <th scope="col">Acrónimo</th>
                                <th scope="col">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($faculties as $faculty)
                                <tr>
                                    <th scope="row">{{ $faculty->code }}</th>
                                    <td>{{ $faculty->name }}</td>
                                    <td>{{ $faculty->foundation }}</td>
                                    <td>{{ $faculty->acronym }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.faculties.edit', $faculty) }}" title="Editar">
                                            <i class="fa fa-2x fa-pencil-square-o" style="color: green;" aria-hidden="true"></i>
                                        </a>
                                        <a class="link-eliminar" href="{{ route('admin.faculties.destroy', $faculty) }}" title="Eliminar" onclick="return confirm('¿Estás seguro de querer eliminar el Periodo Académico')">
                                            <i class="fa fa-2x fa-trash-o" style="color: red;" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <a type="button" class="btn btn-primary" href="{{ route('admin.faculties.create') }}">Agregar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

