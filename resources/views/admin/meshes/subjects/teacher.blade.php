@extends('layouts.app')

@section('title', "Añadir Docente a la Asignatura")

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
                            <li class="breadcrumb-item active" aria-current="page">{{ $mesh->name }}</li>
                        </ol>
                    </nav>

                    <div class="panel-body">
                        {!! Form::open(['method' => 'POST', 'route' => ['admin.meshes.subjects.teacher.store', $mesh, $subject]]) !!}
                            {!! Field::select('id_user', $teachers, ['class' => 'chosen-select']) !!}
                            {!! Field::select('id_period', $periods, ['class' => 'chosen-select']) !!}
                            {!! Field::select('parallel',
                                ['A' => 'A',
                                'B' => 'B',
                                'C' => 'C',
                                'D' => 'D',
                                'E' => 'E',
                                'F' => 'F',
                                'G' => 'G',
                                'H' => 'H',
                                'I' => 'I',
                                'J' => 'J',
                                'K' => 'K',
                                'L' => 'L',
                                'M' => 'M',
                                'N' => 'N'],
                                ['class' => 'chosen-select']
                            ) !!}
                            {!! Form::submit('Agregar', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('.chosen-select').chosen({width: "100%"})
    </script>
@endsection