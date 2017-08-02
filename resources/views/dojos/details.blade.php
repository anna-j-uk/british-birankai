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
                
                    <div class="thumbnail same-height">
                        <img src="../../images/shared/user-image-with-black-background_318-34564.jpg">
                        <div class="caption">
                            <h3>{{ $dojo->teacher->name }}</h3>
                            <p> estibulum tempus urna sed ipsum laoreet, at imperdiet nisl imperdiet.  </p>
                        </div>
                    </div>
                
                </div>

                <div class="col-sm-4">
                    <div id="dojo-map" class="same-height"></div>
                </div>

                <div class="col-sm-4 same-height">
                    <div class="caption">
                        <h3>Timetable</h3>
                    </div>

                    @foreach($dojo->info['timetable'] as $timetable)
                        <h4> {{ $timetable['day'] }} </h4>

                        <table class="table table-hover table-bordered">
                            <tbody>
                                <tr>
                                    <th>Time</th>
                                    <th>Age</th>
                                    <th>Class</th>
                                </tr>

                                @foreach($timetable['times'] as $times)
                                    <tr>
                                        <td> {{ $times['time'] }} </td>
                                        <td> {{ $times['age'] }} </td>
                                        <td> {{ $times['class'] }} </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endforeach
                </div>
            </div>

            <div class="panel panel-danger">
                <div class="panel-heading">Some kind of notice!!</div>
                <div class="panel-body">
                    Classes are cancelled on days: x, y, z...
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h3>Extra information</h3>
                    <p>
                        Aenean sollicitudin consectetur laoreet. Aenean posuere, mauris vitae accumsan mattis, elit libero bibendum neque, vitae elementum purus risus in ante. Aenean quis ex eget augue tristique venenatis. Vivamus non consectetur felis, ornare pharetra erat. In et facilisis enim. Fusce libero leo, pharetra sed lacus in, euismod aliquet metus. Aenean faucibus accumsan vestibulum. Suspendisse potenti. Proin convallis condimentum risus, id mattis neque pellentesque rutrum. Donec pulvinar quis sem non facilisis.
                    </p>
                <div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('javascript')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.0/jquery.matchHeight-min.js"></script>
<script>
    
    $(function() {
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
        $('.same-height').matchHeight();
    });
</script>
@endsection
