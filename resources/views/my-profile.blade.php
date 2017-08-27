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
                    <img class="card-img-top" src="{{ $user->getAvatarUrl() }}" alt="Card image cap">
                    <div class="form-group m-3">
                        <input type="url" id="avatar-url" class="form-control" placeholder="Avatar url">
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <form action="">
                    <div class="form-group">
                        <lable for="user-name">Name</lable>
                        <input id="user-name" class="form-control" type="text" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label for="description">About me</label>
                        <textarea class="form-control" id="description" rows="3" >{{ $user->getDescription() }}</textarea>
                    </div>
                    <div class="form-group">
                        <lable for="user-email">Email</lable>
                        <input id="user-email" class="form-control" type="text" value="{{ $user->email }}">
                    </div>
                    <!-- <div class="form-group">
                        <lable>Current Password</lable>
                        <input class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <lable>New Password</lable>
                        <input class="form-control" type="text">
                        <input class="form-control" type="text">
                    </div> -->

                    <button id="update-user" type="button" class="btn btn-primary float-right">Submit</button>
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
        @endif

    </div>

@endsection

@section('javascript')
    <script>
        'use strict';
        var user = JSON.parse('{!! json_encode($user) !!}');

        function onUserSubmit() {
            var avatarUrl = $('#avatar-url').val() || user.info.avatarUrl;
            var data = {
                name: $('#user-name').val(),
                email: $('#user-email').val(),
                info: {
                    userDescription: $('#description').val()
                }
            };
            if (avatarUrl) {
                data.info.avatarUrl = avatarUrl;
            }
            console.log(data)
            sendAjaxRequest(
                'PUT',
                '/my-profile/' + user.id,
                data
            );
        };

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
            $('#update-user').click(onUserSubmit);
            $('#admin-submit').click(onAdminSubmitClick);
            $('.admin-remove').click(onAdminRemoveClick);
        });
    </script>
@endsection