@extends('master')

@section('title', 'Repository Lookup')

@section('content')
    <form method="POST" action="/">
        <input name="search" type="text"/>
        <input name="submit" type="submit">
        {{ csrf_field() }}
    </form>

    @if(count($contributors) > 0 )
        <ul>
            @foreach($contributors as $user)
                <li><img src="{{ $user['avatar_url'] }}" class="avatar"/> {{ $user['name'] }} <small>{{ $user['contributions'] }} contribution(s)</small></li>
            @endforeach
        </ul>
    @endif
@endsection