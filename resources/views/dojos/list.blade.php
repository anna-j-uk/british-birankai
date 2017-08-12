@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

                @foreach ($dojos as $dojo)

                    <div class="card my-3">
                        <div class="card-body">
                            <a href="./dojos/{{ $dojo->id }}">
                                <h3 class="card-title"> {{ $dojo->name }} </h3>
                            </a>
                            <p class="card-text"> <i> {{ $dojo->info['shortDescription'] }} </i> </p>
                            <dl class="dl-horizontal">
                                <dt> Teacher </dt>
                                <dd> {{ $dojo->teacher->name }} </dd>
                                <dt> Classes </dt>
                                <dd> {{ $dojo->info['classes'] }} </dd>
                                <dt> Address </dt>
                                <dd> {{ $dojo->info['address'] }} </dd>
                            </dl>

                            <a class="btn btn-primary" href="{{ $dojo->url }}" target="_blank"> Website </a>
                        </div>
                    </div>

                @endforeach
        </div>
    </div>
</div>
@endsection
