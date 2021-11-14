@extends('layouts.app')

@section('content')
<div class="card my-5">
    <div class="card-header">
        <h1>Edit Reply</h1>
    </div>
    <div class="card-body">
        <form action="{{ route('reply.update',['id'=>$reply->id]) }}" method="post">
            {{ csrf_field() }}

            <div class="ui form">

                <div class="field">
                    <label>Edit Reply</label>
                    <textarea name="content" id="content">{{ $reply->content }}</textarea>
                </div>
            </div>
            <button type="submit" class="ui green button my-3">Update Reply</button>
        </form>
    </div>
</div>


@endsection
