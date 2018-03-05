@extends('layouts.app')

@section('title', 'Staff')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <nav class="panel-heading" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('home') }}">Inicio</a></li>
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.home') }}">Administración</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Staff</li>
                        </ol>
                    </nav>

                    <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">Cédula</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Email</th>
                                <th scope="col">Cargo</th>
                                <th scope="col">Firma</th>
                                <th scope="col">Cargo en Firma</th>
                                <th scope="col">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($staff_members as $staff_member)
                                <tr>
                                    <th scope="row">{{ $staff_member->user->card }}</th>
                                    <td>{{ $staff_member->user->name }}</td>
                                    <td>{{ $staff_member->user->email }}</td>
                                    <td>{{ $staff_member->position}}</td>
                                    <td>{{ $staff_member->signature}}</td>
                                    <td>{{ $staff_member->signature_position}}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.staff.edit', $staff_member) }}" title="Editar">
                                            <i class="fa fa-2x fa-pencil-square-o" style="color: green;" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <a type="button" class="btn btn-primary" href="{{ route('admin.staff.create') }}">Agregar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
