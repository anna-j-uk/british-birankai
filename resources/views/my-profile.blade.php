@extends('layouts.app')

@section('content')

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <h1> My Profile </h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="../../images/shared/user-image-with-black-background_318-34564.jpg" alt="Card image cap">
                    <div class="card-body">
                        <label class="custom-file">
                            <input type="file" id="file2" class="custom-file-input">
                            <span class="custom-file-control"></span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <form action="">
                    <div class="form-group">
                        <lable>Name</lable>
                        <input class="form-control" type="text" placeholder="test" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <lable>Email</lable>
                        <input class="form-control" type="text" placeholder="test" value="{{ $user->email }}">
                    </div>
                    <!-- <div class="form-group">
                        <lable>Current Password</lable>
                        <input class="form-control" type="text" placeholder="test">
                    </div>
                    <div class="form-group">
                        <lable>New Password</lable>
                        <input class="form-control" type="text" placeholder="test">
                        <input class="form-control" type="text" placeholder="test">
                    </div> -->

                    <button id="submit" type="button" class="btn btn-primary float-right">Submit</button>
                </form>

            </div>
        </div>

        @if ($user->isAdmin)
            <div class="row mt-4">
                <div class="col-md-12">
                    <h1> Admins </h1>
                </div>
            </div>

            <div class="row">
                <form class="col-md-12">
                    <div class="input-group">
                        <select class="form-control" id="add-admin-select">
                            <option disabled selected value> -- select an option -- </option>
                            @foreach($normies as $normie)
                                <option data-id="{{ $normie->id }}">{{ $normie->name }}</option>
                            @endforeach
                        </select>
                        <span class="input-group-addon" id="basic-addon2">
                            <a id="admin-submit" href=""> Add to Admins </a>
                        </span>
                    </div>
                </form>
            </div>

            <div class="row mt-3">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                            <th>Name</th>
                            <th>Email</th>
                            @if ($user->isAdmin)
                                <th>Remove</th>
                            @endif
                            </tr>
                        </thead>

                        <tbody>
                        @foreach ($admins as $admin)
                            <tr>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->email }}</td>
                                @if ($user->isAdmin)
                                    <td>
                                        <a href="" class="admin-remove btn btn-danger" role="button" data-id="{{ $admin->id }}">Remove</a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif

@endsection

@section('javascript')
    <script>
        'use strict';

        function onAdminSubmitClick(e) {
            e.preventDefault();
            var userId = $('#add-admin-select option:selected').data('id');
            if (userId) {
                sendAjaxRequest(
                    'POST',
                    '/admin/' + userId
                );
            }
        };

        function onAdminRemoveClick(e) {
            e.preventDefault();
            var userId = $(e.currentTarget).data('id');
            if (userId) {
                sendAjaxRequest(
                    'DELETE',
                    '/admin/' + userId
                );
            }
        };

        function sendAjaxRequest(method, url, data) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url,
                method: method,
                data: data
            }).done(function (data) {
                location.reload();
            }).fail(function () {
                alert('Something went wrong.')
            });
        }

        $(function () {
            $('#admin-submit').click(onAdminSubmitClick);
            $('.admin-remove').click(onAdminRemoveClick);
        });
    </script>
@endsection