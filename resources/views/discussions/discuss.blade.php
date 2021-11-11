@extends('layouts.app')

@section('content')
<div class="card my-5">
    <div class="card-header">
        <h1>Creat a new Discussion</h1>
    </div>
    <div class="card-body">
        <form action="{{ route('discussion.store') }}" method="post">
            {{ csrf_field() }}

            <div class="ui form">
                <div class="field">
                    <label>Discussion Title</label>
                    <input type="text" name="title" id="title" placeholder="Enter Discussion Title...">
                </div>
                <div class="field">
                    <label for="channel">Choose a Channel</label>
                    <select name="channel_id" id="channel_id" class="ui dropdown">
                        <option value="">Select Channel</option>
                        @foreach ($channels as $channel)
                        <option value="{{ $channel->id }}">{{ $channel->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="field">
                    <label>Ask a Question</label>
                    <textarea name="content" id="content"></textarea>
                </div>
            </div>
            <button type="submit" class="ui teal button my-3">Create Discussion</button>
        </form>
    </div>
</div>

@if (Session::has('success_create'))
    <script>
        swal('Great Job!',"{!! Session::get("success_create") !!}", "success",{button:"OK"});
    </script>
@endif
@endsection
