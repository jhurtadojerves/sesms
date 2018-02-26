@extends('layouts.app')

@section('title', 'Detalle de Asignaturas de la malla Curricular')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <nav class="panel-heading" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('home') }}">Inicio</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.home') }}">Administración</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.meshes.index') }}">Mallas Curriculares</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $mesh->name }}</li>
                        </ol>
                    </nav>

                    <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">Código</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">HP</th>
                                <th scope="col">HA</th>
                                <th scope="col">HT</th>
                                <th scope="col">Créditos</th>
                                <th scope="col">Prerequisitos</th>
                                <th scope="col">Corequisitos</th>
                                <th scope="col">Nivel</th>
                                <th scope="col">Carrera</th>
                                <th scope="col">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($mesh->subjects as $subject)
                                <tr>
                                    <th scope="row"><a href="{{ route('admin.meshes.subjects.show', [$mesh->id, $subject->id]) }}">{{ $subject->code }}</a></th>
                                    <td>{{ $subject->name }}</td>
                                    <td>{{ $subject->hp }}</td>
                                    <td>{{ $subject->ha }}</td>
                                    <td>{{ $subject->ht }}</td>
                                    <td>{{ $subject->credits }}</td>
                                    <td>{{ $subject->prerequisites }}</td>
                                    <td>{{ $subject->corequisites }}</td>
                                    <td>{{ $subject->level }}</td>
                                    <td>{{ $subject->mesh->career->name }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.meshes.subjects.teacher', [$mesh, $subject]) }}" title="Añadir Docente">
                                            <i class="fa fa-2x fa-plus-square" aria-hidden="true"></i>
                                        </a>
                                        <a href="#" title="Editar">
                                            <i class="fa fa-2x fa-pencil-square-o" style="color: green;" aria-hidden="true"></i>
                                        </a>
                                        <a class="link-eliminar" href="#" title="Eliminar" onclick="return confirm('¿Estás seguro de querer eliminar la Malla Curricular?')">
                                            <i class="fa fa-2x fa-trash-o" style="color: red;" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <a type="button" class="btn btn-primary" href="{{ route('admin.meshes.subjects.create', $mesh) }}">Agregar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
