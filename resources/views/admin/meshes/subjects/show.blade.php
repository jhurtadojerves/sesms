@extends('layouts.app')

@section('title', "Detalle de la Asignatura $subject->name")

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
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.meshes.show', $mesh) }}">{{ $mesh->name }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $subject->name }}</li>
                        </ol>
                    </nav>

                    <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">Docente</th>
                                <th scope="col">Periodo Académido</th>
                                <th scope="col">Asignatura</th>
                                <th scope="col">Paralelo</th>
                                <th scope="col">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($upss as $ups)
                                <tr>
                                    <th scope="row">{{ $ups->user->name }}</th>
                                    <td>{{ $ups->period->name }}</td>
                                    <td>{{ $subject->name }}</td>
                                    <td>{{ $ups->parallel }}</td>
                                    <td class="text-center">
                                        <a href="#" title="Editar">
                                            <i class="fa fa-2x fa-pencil-square-o" style="color: green;" aria-hidden="true"></i>
                                        </a>
                                        <a class="link-eliminar" href="#" title="Eliminar" onclick="return confirm('¿Estás seguro de querer eliminar el docente?')">
                                            <i class="fa fa-2x fa-trash-o" style="color: red;" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <a type="button" class="btn btn-primary" href="{{ route('admin.meshes.subjects.teacher', [$mesh, $subject]) }}">Agregar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
