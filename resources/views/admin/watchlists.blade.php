@extends('welcome')

@section('content')
    
<h2>Watchlists</h2>
<form method="POST" action="{{ action('AdminController@deleteWatchlist') }}">
    @method('DELETE')
    @csrf
    <table class="table">
        <thead>
            <tr>
                <th scope="col">@sortablelink('id')</th>
                <th scope="col">@sortablelink('name')</th>
                <th scope="col">@sortablelink('created_at')</th>
                <th scope="col">@sortablelink('updated_at')</th>
                <th scope="col">@sortablelink('user_id')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($watchlists as $watchlist)
            
            <tr>
                <th scope="row"> <input type="checkbox"
                    name="<?php echo $watchlist["id"] ;?>"
                    value="<?php echo $watchlist["id"] ;?>">
                    <?php echo $watchlist["id"] ;?><br>
                </th>
                <td>{{$watchlist["name"]}}</td>
                <td>{{$watchlist["created_at"]}}</td>
                <td>{{$watchlist["updated_at"]}}</td>
                <td>{{$watchlist["user_id"]}}</td>
            </tr>
            @endforeach
            <input type="submit" value="Submit">
        </form>
    </tbody>
</table>
{{ $watchlists->links() }}

<a href="/admin">Go Back</a>
@endsection
