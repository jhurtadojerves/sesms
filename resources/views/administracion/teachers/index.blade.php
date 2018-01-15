@extends('layouts.app')

@section('title', 'Docentes')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <nav class="panel-heading" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('home') }}">Inicio</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.home') }}">Administración</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Docentes</li>
                        </ol>
                    </nav>

                    <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">Cédula</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">email</th>
                                <th scope="col">Género</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Número Celular</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($teachers as $teacher)
                                <tr>
                                    <th scope="row">{{ $teacher->card }}</th>
                                    <td>{{ $teacher->name }}</td>
                                    <td>{{ $teacher->email }}</td>
                                    <td>{{ $teacher->gender }}</td>
                                    <td>{{ $teacher->phone }}</td>
                                    <td>{{ $teacher->cell_phone }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.teachers.edit', $teacher) }}" title="Editar">
                                            <i class="fa fa-2x fa-pencil-square-o" style="color: green;" aria-hidden="true"></i>
                                        </a>
                                        <a class="link-eliminar" href="{{ route('admin.teachers.destroy', $teacher) }}" title="Eliminar" onclick="return confirm('¿Estás seguro de querer eliminar el docente?')">
                                            <i class="fa fa-2x fa-trash-o" style="color: red;" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <a type="button" class="btn btn-primary" href="{{ route('admin.teachers.create') }}">Agregar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
