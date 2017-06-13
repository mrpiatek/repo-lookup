@extends('master')

@section('title', 'Repository Lookup')

@section('content')
    <form method="POST" action="/">
        <input name="search" type="text"/>
        <input name="submit" type="submit">
        {{ csrf_field() }}
    </form>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->messages() as $error)
                <li>@lang('errors.' . $error[0])</li>
            @endforeach
        </ul>
    @endif

    @if(count($contributors) > 0 )
        <table id="contributors">
            <tr>
                <th>Avatar</th>
                <th><a href="#" id="name-header">Username</a></th>
                <th><a href="#" id="contributions-header">Contributions</a></th>
            </tr>
            @foreach($contributors as $user)
                <tr class="contributor-row">
                    <td><img src="{{ $user['avatar_url'] }}" class="avatar"/></td>
                    <td>{{ $user['name'] }}</td>
                    <td>{{ $user['contributions'] }}</td>
                </tr>
            @endforeach
        </table>
    @endif
@endsection