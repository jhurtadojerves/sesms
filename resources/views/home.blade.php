@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <nav class="panel-heading" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Inicio</li>
                    </ol>
                </nav>

                <div class="panel-body">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur id erat ut nisi feugiat rhoncus. Phasellus purus dui, vulputate eget malesuada a, malesuada id lectus. Nulla nec risus tellus. Pellentesque posuere metus a tortor efficitur, nec pharetra est lacinia. Morbi et nunc sed orci vestibulum semper. Etiam porttitor purus id tortor venenatis mollis. Mauris lacinia eu ante nec pharetra. Vestibulum vestibulum, elit id hendrerit luctus, massa erat consequat enim, mollis efficitur enim massa ac dui. Suspendisse potenti.
                </p>

                    <ul>
                        <li><a href="{{ route('syllable.index') }}">Ver sílabos</a></li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
