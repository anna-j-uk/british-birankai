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

            <div class="card-group">

                <div class="card">
                    <img class="card-img-top" src="../../images/shared/user-image-with-black-background_318-34564.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">{{ $dojo->teacher->name }}</h4>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>

                <div class="card">
                    <div id="dojo-map" style="height: 100%; min-height: 500px"></div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Timetable</h4>
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

            </div>

            <div class="card border-danger mt-3 w-100">
                <div class="card-body text-danger">
                    <h4 class="card-title">Some kind of notice!!</h4>
                    <p class="card-text"> Classes are cancelled on days: x, y, z... </p>
                </div>
            </div>

            <div class="card mt-3 w-100">
                <div class="card-body">
                    <h4 class="card-title">Extra information</h4>
                    <p class="card-text">
                        Aenean sollicitudin consectetur laoreet. Aenean posuere, mauris vitae accumsan mattis, elit libero bibendum neque, vitae elementum purus risus in ante. Aenean quis ex eget augue tristique venenatis. Vivamus non consectetur felis, ornare pharetra erat. In et facilisis enim. Fusce libero leo, pharetra sed lacus in, euismod aliquet metus. Aenean faucibus accumsan vestibulum. Suspendisse potenti. Proin convallis condimentum risus, id mattis neque pellentesque rutrum. Donec pulvinar quis sem non facilisis.
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('javascript')
    <script>
        function initMap() {
            var dojo = {lat: {{ $dojo->latitude }}, lng: {{ $dojo->longitude }} };
            var map = new google.maps.Map(document.getElementById('dojo-map'), {
                zoom: 15,
                center: dojo
            });
            var marker = new google.maps.Marker({
                position: dojo,
                map: map
            });
        }
    </script>

    <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-IXHcGiNJ9fxySxDgyz3VqzjFnRLchFM&callback=initMap">
    </script>
@endsection
