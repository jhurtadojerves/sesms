@extends('layouts.app')

@section('title', 'Sistema de Registro de Sílabos')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <nav class="panel-heading" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Inicio</li>
                    </ol>
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="text-center"><b>Sistema de Estandarización de Sílabos - Morona Santiago</b></h1>
                        </div>
                    </div>
                </nav>

                <div class="panel-body">
                    <div class="container">

                        <br><br><br>
                        <div class="row">
                            <div class="col-md-2">
                                <img src="images/llama.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-3">
                                <h3 style="color: red;"><b>Misión</b></h3>
                                <p class="text-justify">Formar profesionales e investigadores competentes, para contribuir al desarrollo sustentable del país.</p>
                            </div>
                            <div class="col-md-3">
                                <h3 style="color: red;"><b>Visión</b></h3>
                                <p class="text-justify">Ser la institución líder de docencia con investigación, que garantice la formación profesional, la generación de ciencia y tecnología para el desarrollo humano integral, con reconocimiento nacional e internacional.</p>
                            </div>
                            <div class="col-md-3">
                                <div class="list-group">
                                    @guest
                                        <a href="{{ route('login') }}" class="list-group-item list-group-item-action list-group-item-dark">Iniciar Sesión</a>
                                    @else
                                        @if(Auth::user()->type == 'teacher')
                                            <a class="list-group-item list-group-item-action list-group-item-dark" href="{{ route('syllable.index') }}">Ver Sílabos</a>
                                        @elseif(Auth::user()->type == 'coordinator')
                                            <a class="list-group-item list-group-item-action list-group-item-dark" href="{{ route('coordinator.index') }}">Revisar Sílabos</a>
                                        @else
                                            <a class="list-group-item list-group-item-action list-group-item-dark" href="{{ route('admin.home') }}">Administración</a>
                                        @endif
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                           class="list-group-item list-group-item-action list-group-item-dark">
                                            Logout
                                        </a>
                                    @endguest
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
