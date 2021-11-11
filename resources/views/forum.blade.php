@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h2 class="ui header ui blue ribbon label">
            <i class="assistive listening systems icon"></i>
            <div class="content">
                Recent Discussions
            </div>
        </h2>
    </div>
</div>

@foreach ($discussions as $discussion)
<div class="card border-primary my-5">
    <div class="card-header border-primary">
        <img src="{{ $discussion->user->avatar }}" alt="" width="70" height="70"
            border-radius="50%" />&nbsp;&nbsp;&nbsp;
        <span class="">{{ $discussion->user->name }} &nbsp;<span><b>({{ $discussion->user->points }} points)&nbsp;&nbsp;</b></span><b>{{ $discussion->created_at->diffForHumans() }}</b></span>
        <a href="{{ route('discussion.show',['slug'=>$discussion->slug]) }}" class="ui secondary button float-right">View</a>
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

    <div>
        {{ $discussions->links() }}
    </div>

    @endsection
