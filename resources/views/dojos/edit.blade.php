@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 mt-3 mx-auto">
            @if ($dojo->id)
                <h1>Edit "{{ $dojo->name }}"</h1>
            @else
                <h1>Add New Dojo</h1>            
            @endif
            <form>
                <div class="form-group">
                    <label for="name">Dojo name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" value="{{ $dojo->name }}">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" rows="3" >{{ $dojo->info['shortDescription'] }}</textarea>
                </div>
                <div class="form-group">
                    <label for="teacher">Teacher</label>
                    <select class="form-control" id="teacher">
                        <option disabled selected value> -- select an option -- </option>
                        @foreach($users as $user)
                            @if($dojo->teacher && $dojo->teacher->id === $user->id)
                                <option selected data-id="{{ $user->id }}">{{ $user->name }}</option>
                            @else
                                <option data-id="{{ $user->id }}">{{ $user->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-row">
                    <div class="col">
                    <label>Latitude</label>
                    <input id="latitude" type="number" class="form-control" placeholder="y" value="{{ $dojo->latitude }}">
                    </div>
                    <div class="col">
                    <label>Longitude</label>
                    <input id="longitude" type="number" class="form-control" placeholder="x" value="{{ $dojo->longitude }}">
                    </div>
                    <div class="col">
                    <small class="form-text text-muted">
                        <ul>
                            <li> Go to google maps and find your dojo </li>
                            <li> Right click 'What's here?' </li>
                            <li> You'll see a number like this '52.412555, -1.788004' </li>
                            <li> First one is latitude, the other longitude </li>
                        </ul>
                    </small>
                    </div>
                </div> <!-- end form-row -->

                <div class="form-check">
                    <label class="form-check-label">
                        <input id="notice" class="form-check-input" type="checkbox" value="">
                        Show notice
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input id="extra-information" class="form-check-input" type="checkbox" value="">
                        Show extra information
                    </label>
                </div>

                <h3> Timetable </h3>
                <button id="add-day" type="button" class="btn btn-secondary"> Add Day </button>
                <div id="timetable">
                    @foreach($dojo->info['timetable'] as $timetable)
                        <div class="day">
                            <div class="form-row">
                                <div class="form-group col-md-10">
                                    <label for="name">Day</label>
                                    <input type="text" class="weekday form-control" placeholder="Enter day" value="{{ $timetable['day'] }}">
                                </div>
                                <div class="form-group col-md-2">
                                    <button class="add-time btn btn-secondary" type="button">Add time</button>
                                </div>                
                            </div>
                            <div class="times">
                                @foreach($timetable['times'] as $times)
                                    <div class="time-row form-row">
                                        <div class="col">
                                        <label>Time</label>
                                        <input type="text" class="time form-control" placeholder="19:30 - 20:30" value="{{ $times['time'] }}">
                                        </div>
                                        <div class="col">
                                        <label>Age</label>
                                        <input type="text" class="age form-control" placeholder="Adults" value="{{ $times['age'] }}">
                                        </div>
                                        <div class="col">
                                        <label>Class</label>
                                        <input type="text" class="class-type form-control" placeholder="General Aikido" value="{{ $times['class'] }}">
                                        </div>
                                        <div class="col">
                                            <button class="remove-time fa fa-times btn btn-danger" type="button"></button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button class="remove-day btn btn-secondary" type="button">Remove Day</button>
                        </div>
                        @endforeach
                </div>

                <button id="submit" type="button" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection

@section('javascript')
    <script type="text/template" id="add-day-template">
        <div class="day">
            <div class="form-row">
                <div class="form-group col-md-10">
                    <label for="name">Day</label>
                    <input type="text" class="weekday form-control" placeholder="Enter day" value="">
                </div>
                <div class="form-group col-md-2">
                    <button class="add-time btn btn-secondary" type="button">Add time</button>
                </div>                
            </div>
            <div class="times"></div>
            <button class="remove-day btn btn-secondary" type="button">Remove Day</button>
        </div>
    </script>
    <script type="text/template" id="add-time-template">
        <div class="time-row form-row">
            <div class="col">
            <label>Time</label>
            <input type="text" class="time form-control" placeholder="19:30 - 20:30" value="">
            </div>
            <div class="col">
            <label>Age</label>
            <input type="text" class="age form-control" placeholder="Adults" value="">
            </div>
            <div class="col">
            <label>Class</label>
            <input type="text" class="class-type form-control" placeholder="General Aikido" value="">
            </div>
            <div class="col">
                <button class="remove-time fa fa-times btn btn-danger" type="button"></button>
            </div>
        </div>
    </script>

    <script>
        'use strict';

        var dojo = JSON.parse('{!! json_encode($dojo) !!}');
        var info = dojo.info;
        var timetable = info.timetable;

        function createJqueryElement(selector) {
            return $.parseHTML($(selector).html());
        };

        function setupListeners() {
            $('.remove-day').off('click');
            $('.remove-time').off('click');
            $('.add-time').off('click');
            $('.remove-day').click(function (eventData) {
                $(eventData.target.parentElement).detach();
            });
            $('.remove-time').click(function (eventData) {
                $(eventData.target.parentElement.parentElement).detach();
            });
            $('.add-time').click(function (eventData) {
                var $region = $(eventData.target).closest('.day').find('.times');
                $region.append(createJqueryElement('#add-time-template'));
                setupListeners();
            });
        };

        function onAddDayClick() {
            var el,
                $el,
                $removeButton,
                $region;
            el = createJqueryElement('#add-day-template');
            $region = $('#timetable');
            $el = $region.append(el);
            setupListeners();
        };

        function getFormValues() {
            var values;
            values = {
                name: $('#name').val(),
                teacher_id: $('#teacher option:selected').data('id'),
                latitude: $('#latitude').val(),
                longitude: $('#longitude').val(),
                info: {
                    shortDescription: $('#description').val(),
                    timetable: []
                }
            }
            $('.day').each(function(index, el) {
                var $el = $(el);
                var day = {
                    day: $el.find('.weekday').val(),
                    times: []
                };
                $el.find('.time-row').each(function (index, timeEl) {
                    var $timeEl = $(timeEl);
                    var time = {
                        time: $timeEl.find('.time').val(),
                        age: $timeEl.find('.age').val(),
                        class: $timeEl.find('.class-type').val()
                    }
                    day.times.push(time);
                });
                values.info.timetable.push(day);
            })
            return values;
        };

        function onSubmit() {
            var values,
                method;
            values = getFormValues();
            if (dojo.id) {
                method = 'PUT';
            } else {
                method = 'POST';
            }
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "../../dojos",
                method: method,
                data: JSON.stringify(values)
            });
            console.log(values)
        };

        $(function () {
            $('#add-day').click(onAddDayClick);
            $('#submit').click(onSubmit);
            setupListeners();
        });
    </script>
@endsection
