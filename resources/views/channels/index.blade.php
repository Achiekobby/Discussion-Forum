@extends('layouts.app')

@section('content')

<h1 class="ui huge header">Channels</h1>
<table class="ui table">
    @if (count($channels)==0)
    <div class="ui massive red center aligned container message">
        No Results Found
    </div>
    @else
    <thead>
        <tr>
            <th>Id</th>
            <th>Channel</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($channels as $channel)
        <tr>
            <td>{{ $channel->id }}</td>
            <td>{{ $channel->title }}</td>
            <td>
                <a href="{{ route('channels.edit',['channel'=>$channel->id]) }}">
                    <div class="ui  teal animated button" tabindex="0">
                        <div class="hidden content">Edit</div>
                        <div class="visible content">
                            <i class="edit icon"></i>
                        </div>
                    </div>
                </a>
            </td>
            <td>
                <form action="{{ route('channels.destroy',['channel'=>$channel->id]) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field("DELETE")}}
                    <button class="ui red button" type="submit">
                        <i class="trash alternate icon"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>

@if (Session::has('success_update'))
<script>
    toastr.success("{!! Session::get('success_update') !!}");

</script>
@elseif (Session::has('success_destroy'))
<script>
    toastr.success("{!! Session::get('success_destroy') !!}");

</script>
@endif
@endsection
