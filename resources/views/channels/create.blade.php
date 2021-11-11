@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        <h1 class="text-center">
            Create New Channel
        </h1>
    </div>
    <div class="card-body">
        <form class="ui form" action="{{ route('channels.store') }}" method="post">
            @csrf
            <div class="field">
                <label for="channel-title">Channel Title</label>
                <input type="text" name="channel" placeholder="Channel Title...">
            </div>
            <button class="ui teal button" name="create-channel" type="submit">Create Channel</button>
        </form>
    </div>
</div>


@if (Session::has('success'))
<script>
    swal("Nice One!", "{!! Session::get('success') !!}", "success", {
        button: 'OK'
    })

</script>
@endif
@endsection
