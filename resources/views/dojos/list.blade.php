@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

                @foreach ($dojos as $dojo)

                    <div class="panel panel-default">
                        <div class="panel-body">
                            <a href="./dojos/{{ $dojo->id }}">
                                <h3> {{ $dojo->name }} </h3>
                            </a>
                            <p> <i> {{ $dojo->info['shortDescription'] }} </i> </p>
                            <dl class="dl-horizontal">
                                <dt> Teacher </dt>
                                <dd> {{ $dojo->teacher->name }} </dd>
                                <dt> Classes </dt>
                                <dd> {{ $dojo->info['classes'] }} </dd>
                                <dt> Address </dt>
                                <dd> {{ $dojo->info['address'] }} </dd>
                                <dt> Website </dt>
                                <dd> <a href="{{ $dojo->url }}" target="_blank"> {{ $dojo->url }} </a> </dd>
                            </dl>
                        </div>
                    </div>

                @endforeach
        </div>
    </div>
</div>
@endsection
