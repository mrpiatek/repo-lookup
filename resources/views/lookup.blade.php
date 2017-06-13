@extends('master')

@section('title', $repoName ?: 'Repository Lookup')

@section('content')
    <form method="POST" action="/">
        <label for="search">Full repository name:</label><br>
        <input name="search" id="search" type="text" placeholder="laravel/laravel"/>
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
        <hr>
        <table id="contributors">
            <tr>
                <th>Avatar</th>
                <th>
                    <a href="?search={{ urlencode($repoName) }}@if($nameNextSort !== SORT_REGULAR)&sort_by=name&sort_order={{ $nameNextSort === SORT_ASC ? 'asc' : 'desc' }}@endif
                            " id="name-header">Username
                        @if($sortBy === \mrpiatek\RepoLookup\ContributorsSorter\ContributorsSorter::NAME_SORT)
                            {{ $sortOrder === SORT_ASC ? '&uarr;' : '&darr;' }}
                        @endif
                    </a></th>
                <th>
                    <a href="?search={{ urlencode($repoName) }}@if($contributionsNextSort !== SORT_REGULAR)&sort_by=contributions&sort_order={{ $contributionsNextSort === SORT_ASC ? 'asc' : 'desc' }}@endif
                            " id="contributions-header">Contributions
                        @if($sortBy === \mrpiatek\RepoLookup\ContributorsSorter\ContributorsSorter::CONTRIBUTIONS_SORT)
                            {{ $sortOrder === SORT_ASC ? '&uarr;' : '&darr;' }}
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