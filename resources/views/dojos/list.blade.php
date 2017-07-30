@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

                @foreach ($dojos as $dojo)

                    <div class="panel panel-default">
                        <div class="panel-body">
                            le dojo <a href="./dojos/{{ $dojo->id }}"> {{ $dojo->name }} </a>
                        </div>
                    </div>

                @endforeach
        </div>
    </div>
</div>
@endsection
