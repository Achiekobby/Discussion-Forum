@extends('layouts.app')

@section('content')
<div class="card my-5">
    <div class="card-header">
        <h1>Edit Discussion Content</h1>
    </div>
    <div class="card-body">
        <form action="{{ route('discussion.update',['id'=>$discussion->id]) }}" method="post">
            {{ csrf_field() }}

            <div class="ui form">

                <div class="field">
                    <label>Ask a Question</label>
                    <textarea name="content" id="content">{{ $discussion->content }}</textarea>
                </div>
            </div>
            <button type="submit" class="ui teal button my-3">Update Discussion Content</button>
        </form>
    </div>
</div>

@if (Session::has('success_create'))
    <script>
        swal('Great Job!',"{!! Session::get("success_create") !!}", "success",{button:"OK"});
    </script>
@endif
@endsection
