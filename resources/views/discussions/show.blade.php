@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h2 class="ui header ui blue ribbon label">
            <i class="question icon"></i>
            <div class="content">
                Question Discussion
            </div>
        </h2>
    </div>
</div>

<div class="card border-primary my-5">
    <div class="card-header border-primary">
        <img src="{{ $discussion->user->avatar }}" alt="" width="70" height="70"
            border-radius="50%" />&nbsp;&nbsp;&nbsp;
        <span class="">{{ $discussion->user->name }}&nbsp;<span><b>({{ $discussion->user->points }} points)&nbsp;&nbsp;</b></span>  <b>{{ $discussion->created_at->diffForHumans() }}</b></span>
        @if ($discussion->watched_by_auth_user())
        <a href="{{ route('discussion.unwatch',['id'=>$discussion->id]) }}"
            class="ui secondary basic button float-right"><i class="eye slash icon"></i>Unwatch</a>
        @else
        <a href="{{ route('discussion.watch',['id'=>$discussion->id]) }}" class="ui secondary button float-right"><i
            class="eye icon"></i>Watch</a>

        @endif
    </div>
    <div class="card-body">
        <h2 class="text-center">
            {{ $discussion->title }}
        </h2>
        <p class="text-center">
            {{ $discussion->content }}
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

@foreach ($discussion->replies as $reply)
<div class="ui feed">
    <div class="event">
        <div class="label">
            <img src="{{ $reply->user->avatar }}">
        </div>
        <div class="content">
            <div class="summary">
                @<a>{{ $reply->user->name }}</a> contributed
                <div class="date">
                    {{ $reply->created_at->diffForHumans() }}
                </div>
            </div>
            <div class="extra text">
                {{ $reply->content }}
            </div>

            @if ($reply->is_liked_by_auth_user())
            <div class="ui labeled button" tabindex="0">
                <a class="ui red button" href="{{ route('reply.unlike',['id'=>$reply->id]) }}">
                    <i class="heart icon"></i> Unlike
                </a>
                <a class="ui basic red left pointing label" href="">
                    {{ $reply->likes->count() }}
                </a>
            </div>
            @else
            <div class="ui labeled button" tabindex="0">
                <a class="ui button" href="{{ route('reply.like',['id'=>$reply->id]) }}">
                    <i class="heart icon"></i> Like
                </a>
                <a href="" class="ui basic label">
                    {{ $reply->likes->count() }}
                </a>
            </div>
            @endif
            @if ($reply->best_answer==0 && Auth::id()==$discussion->user->id)
                <a href="{{ route('discussion.best_answer',['id'=>$reply->id]) }}" class="ui labeled icon blue button float-right">
                <i class="thumbs up icon"></i>
                Mark as Best
            </a>
            
            @else
                <a class="ui teal tag label float-right">
                    Marked as Best
                </a>
            @endif
        </div>
    </div>
    <div class="ui divider"></div>
    @endforeach
    {{-- Reply Form --}}
    @if (Auth::check())
    <div class="card">
        <div class="card-body">
            <form action="{{ route('discussion.reply',['id'=>$discussion->id]) }}" method="post">
                {{ csrf_field() }}
                <div class="ui form">
                    <label for="reply">
                        <h4>Leave a Reply</h4>
                    </label>
                    <textarea name="reply" id="reply" cols="30" rows="10"></textarea>
                </div>
                <div class="my-3">
                    <button class="ui secondary button float-right" type="submit">Leave a Reply</button>
                </div>
            </form>
        </div>
    </div>
    @else
    <div class="ui warning icon message ">
        <i class="exclamation icon"></i>
        <div class="header fluid">
            You must Login before you can leave reply
        </div>
        
            <a href="{{ route('login') }}" class="ui secondary button mx-5">Login</a>
        
    </div>
    @endif

    @if (Session::has("reply"))
    <script>
        toastr.success("{!! Session::get('reply') !!}");

    </script>
    @elseif (Session::has('info_like'))
    <script>
        toastr.info("{!! Session::get('info_like') !!}");

    </script>
    @elseif (Session::has('info_unlike'))
    <script>
        toastr.info("{!! Session::get('info_unlike') !!}");

    </script>
    @elseif (Session::has('watch_success'))
    <script>
        toastr.info("{!! Session::get('watch_success') !!}");

    </script>
    @elseif (Session::has('mark_success'))
    <script>
        toastr.info("{!! Session::get('mark_success') !!}");

    </script>
    @endif
    @endsection
