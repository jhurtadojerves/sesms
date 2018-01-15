@extends('layouts.app')

@section('title', 'Listado de temas')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <nav class="panel-heading" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('home') }}">Inicio</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('syllable.index') }}">Sílabos</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.meshes.index') }}">Mallas Curriculares</a></li>
                            <li class="breadcrumb-item " aria-current="page"><a href="{{ route('syllable.show', $syllable->id) }}">{{ $syllable->ups->subject->name }}</a></li>
                            <li class="breadcrumb-item active">Temas</li>
                        </ol>
                    </nav>

                    <div class="panel-body">
                        <h1>{{ $unit->name }} - Temas</h1>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Subtemas</th>
                                <th scope="col">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($unit->topics as $topic)
                                <tr>
                                    <td>{{ $topic->name }}</td>
                                    <td>{{ $topic->subtopics }}</td>
                                    <td class="text-center">
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

                        <a type="button" class="btn btn-primary" href="{{ route('syllable.unit.topic.create', [$syllable, $unit]) }}">Agregar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
