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
        <small>Data source: {{ $dataSource }}</small>
        <table id="contributors">
            <tr>
                <th>Avatar</th>
                <th>
                    <a href="?search={{ $encodedRepoName }}{{ isset($nameNextSort) ? '&sort_by=name&sort_order=' . $nameNextSort : '' }}"
                       id="name-header">Username
                        @if($sortBy == 'name')
                            {{ $sortOrder == 'asc' ? '&uarr;' : '&darr;' }}
                        @endif
                    </a></th>
                <th>
                    <a href="?search={{ $encodedRepoName }}{{ isset($contributionsNextSort) ? '&sort_by=contributions&sort_order=' . $contributionsNextSort : '' }}"
                       id="contributions-header">Contributions
                        @if($sortBy == 'contributions')
                            {{ $sortOrder == 'asc' ? '&uarr;' : '&darr;' }}
                        @endif
                    </a>
                </th>
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