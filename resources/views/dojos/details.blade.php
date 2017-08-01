@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="page-header">
                <h1>{{ $dojo->name }}</h1>
            </div>

            <p class="lead">{{ $dojo->info['shortDescription'] }}</p>

            <div class="row">

                <div class="col-sm-4">
                
                    <div class="thumbnail">
                        <img src="../../images/shared/user-image-with-black-background_318-34564.jpg">
                        <div class="caption">
                            <h3>{{ $dojo->teacher->name }}</h3>
                            <p> estibulum tempus urna sed ipsum laoreet, at imperdiet nisl imperdiet.  </p>
                        </div>
                    </div>
                
                </div>

                <div class="col-sm-4">
                    <div id="dojo-map" style="height:400px"></div>
                </div>

                <div class="col-sm-4"></div>
            
            </div>

        </div>
    </div>
</div>
@endsection

@section('javascript')
<script>
    
    $( document ).ready(function() {
        (function() {
            var dojo = {lat: {{ $dojo->latitude }}, lng: {{ $dojo->longitude }} };
            var map = new google.maps.Map(document.getElementById('dojo-map'), {
                zoom: 15,
                center: dojo
            });
            var marker = new google.maps.Marker({
                position: dojo,
                map: map
            });
        })();
    });
</script>
@endsection
