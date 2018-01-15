@extends('layouts.app')

@section('title', 'Malla curricular')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <nav class="panel-heading" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('home') }}">Inicio</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.home') }}">Administración</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Mallas Curriculares</li>
                        </ol>
                    </nav>

                    <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">Código</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Vida de la Malla</th>
                                <th scope="col">Facultad</th>
                                <th scope="col">Escuela</th>
                                <th scope="col">Carrera</th>
                                <th scope="col">Okay</th>
                                <th scope="col">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($meshes as $mesh)
                                <tr>
                                    <th scope="row"><a href="{{ route('admin.meshes.show', $mesh) }}">{{ $mesh->code }}</a></th>
                                    <td>{{ $mesh->name }}</td>
                                    <td>{{ $mesh->life }}</td>
                                    <td>{{ $mesh->career->school->faculty->name }}</td>
                                    <td>{{ $mesh->career->school->name }}</td>
                                    <td>{{ $mesh->career->name }}</td>
                                    <td>{{ $mesh->okay }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.meshes.edit', $mesh) }}" title="Editar">
                                            <i class="fa fa-2x fa-pencil-square-o" style="color: green;" aria-hidden="true"></i>
                                        </a>
                                        <a class="link-eliminar" href="{{ route('admin.meshes.destroy', $mesh) }}" title="Eliminar" onclick="return confirm('¿Estás seguro de querer eliminar la Malla Curricular?')">
                                            <i class="fa fa-2x fa-trash-o" style="color: red;" aria-hidden="true"></i>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <a type="button" class="btn btn-primary" href="{{ route('admin.meshes.create') }}">Agregar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
