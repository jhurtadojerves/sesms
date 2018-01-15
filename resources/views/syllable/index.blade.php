@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <nav class="panel-heading" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('home') }}">Inicio</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Sílabos</li>
                        </ol>
                    </nav>

                    <div class="panel-body">
                        <ul>
                            @foreach($syllables as $syllable)
                                <li><a href="{{ route('syllable.show', $syllable->id) }}">{{  $syllable->ups->subject->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
