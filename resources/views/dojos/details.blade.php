@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default">
                <div class="panel-body">
                    this is the profile page for dojo {{ $dojo->name }} !!

                    <a href="{{ $dojo->url }}" target="_blank"> this is the dojo website </a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
