@extends('layouts.app')

@section('title', 'Escuelas')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <nav class="panel-heading" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('home') }}">Inicio</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.home') }}">Administración</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Escuelas</li>
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
                                <th scope="col">Facultad</th>
                                <th scope="col">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($schools as $school)
                                <tr>
                                    <th scope="row">{{ $school->code }}</th>
                                    <td>{{ $school->name }}</td>
                                    <td>{{ $school->foundation }}</td>
                                    <td>{{ $school->acronym }}</td>
                                    <td>{{ $school->faculty->name }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.schools.edit', $school) }}" title="Editar">
                                            <i class="fa fa-2x fa-pencil-square-o" style="color: green;" aria-hidden="true"></i>
                                        </a>
                                        <a class="link-eliminar" href="{{ route('admin.schools.destroy', $school) }}" title="Eliminar" onclick="return confirm('¿Estás seguro de querer eliminar la escuela?')">
                                            <i class="fa fa-2x fa-trash-o" style="color: red;" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <a type="button" class="btn btn-primary" href="{{ route('admin.schools.soap') }}">Obtener Escuelas</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
