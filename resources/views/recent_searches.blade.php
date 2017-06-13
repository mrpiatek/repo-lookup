@extends('master')

@section('title', 'Recent Searches')

@section('content')
    @if(count($recentSearches) > 0)
        <table>
            @foreach($recentSearches as $item)
                <tr>
                    <td>{{ $item->getSearchDate() }}</td>
                    <td>
                        <a href="/?search={{ urlencode($item->getSearchTerm()) }}">{{ $item->getSearchTerm() }}</a>
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        <p>no recent searches</p>
    @endif
@endsection