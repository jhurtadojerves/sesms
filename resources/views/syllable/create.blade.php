@extends('layouts.app')

@section('title')
    Registrar nuevo sílabo
@endsection


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar Sílabo</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('syllable.create') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('sede') ? ' has-error' : '' }}">
                                <label for="sede" class="col-md-4 control-label">Sede</label>

                                <div class="col-md-6">
                                    <input id="sede" type="text" class="form-control" name="sede" value="{{ old('sede') }}" required>

                                    @if ($errors->has('sede'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('sede') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('delivery') ? ' has-error' : '' }}">
                                <label for="delivery" class="col-md-4 control-label">Delivery</label>

                                <div class="col-md-6">
                                    <input id="delivery" type="date" class="form-control" name="delivery" value="{{ old('delivery') }}" required>

                                    @if ($errors->has('delivery'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('delivery') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('id_ups') ? ' has-error' : '' }}">
                                <label for="id_ups" class="col-md-4 control-label">Materia</label>

                                <div class="col-md-6">
                                    <select name="id_ups" id="id_ups" class="form-control">
                                        @foreach($upss as $ups)
                                            <option value="{{ $ups->id }}">{{ $ups->subject->name }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('delivery'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('delivery') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            {!! Form::submit('Agregar', ['class' => 'btn btn-primary']) !!}




                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
