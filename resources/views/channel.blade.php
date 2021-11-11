@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h2 class="ui header ui blue ribbon label">
            <i class="asterisk loading icon"></i>
            <div class="content">
                Channel: {{ $channel_title }}
            </div>
        </h2>
    </div>
</div>

@if ($discussions->count()==0)
<div class="ui negative message">
    <div class="header">
        <h1 class="text-center">NO RESULTS FOUND</h1>
    </div>
</div>
@else
    @foreach ($discussions as $discussion)
<div class="card border-primary my-5">
    <div class="card-header border-primary">
        <img src="{{ $discussion->user->avatar }}" alt="" width="70" height="70"
            border-radius="50%" />&nbsp;&nbsp;&nbsp;
        <span class="">{{ $discussion->user->name }} <b>{{ $discussion->created_at->diffForHumans() }}</b></span>
        <a href="{{ route('discussion.show',['slug'=>$discussion->slug]) }}"
            class="ui secondary button float-right">View</a>
    </div>
    <div class="card-body">
        <h2 class="text-center">
            {{ $discussion->title }}
        </h2>
        <p class="text-center">
            {{\Illuminate\Support\Str::limit($discussion->content, 50) }}
        </p>
    </div>
    <div class="card-footer">
        <div class="ui labeled button" tabindex="0">
            <div class="ui basic blue button">
                <i class="reply all icon"></i> Replies
            </div>
            <a class="ui basic left pointing blue label">
                {{ $discussion->replies->count() }}
            </a>
        </div>
    </div>
</div>
@endforeach
@endif



<div>
    {{ $discussions->links() }}
</div>

@endsection
