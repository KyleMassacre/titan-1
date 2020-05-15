@extends('layouts.admin')

@section('page')
    <h1 class="h3 mb-4 text-gray-800">Update Cronjob</h1>


    <div class="card shadow mb-4">
        <div class="card-body">
            {!! \Form::open()->route('admin.cronjobs.update', [$cronjob->id])->fill($cronjob)->put() !!}
            @include('admin.cronjobs.form')
            {!! \Form::submit('Update Cronjob') !!}
            {!! \Form::close() !!}
        </div>
    </div>
@endsection
