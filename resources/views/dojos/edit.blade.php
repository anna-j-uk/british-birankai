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
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection