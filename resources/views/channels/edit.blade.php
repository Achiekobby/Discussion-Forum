@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        <h1 class="text-center">
            Update: {{ $channel->title }}
        </h1>
    </div>
    <div class="card-body">
        <form class="ui form" action="{{ route('channels.update',['channel'=>$channel->id]) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="field">
                <label for="channel-title">Channel Title</label>
                <input type="text" name="channel" value="{{ $channel->title }}">
            </div>
            <button class="ui olive button" name="create-channel" type="submit">Update Channel</button>
        </form>
    </div>
</div>

@endsection
