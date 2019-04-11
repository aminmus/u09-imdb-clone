@extends('welcome')

@section('content')
    

<h2>Reviews</h2>
<form method="POST" action="{{ action('AdminController@deleteReview') }}">
        @method('DELETE')
        @csrf
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">@sortablelink('id')</th>
                    <th scope="col">@sortablelink('content')</th>
                    <th scope="col">@sortablelink('rating')</th>
                    <th scope="col">@sortablelink('created_at')</th>
                    <th scope="col">@sortablelink('updated_at')</th>
                    <th scope="col">@sortablelink('film_id')</th>
                    <th scope="col">@sortablelink('user_id')</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reviews as $review)
                
                <tr>
                    <th scope="row"> <input type="checkbox"
                        name="{{$review['id']}}"
                        value="{{$review['id']}}">
                        {{$review['id']}}<br>
                    </th>
                    <td>{{$review["content"]}}</td>
                    <td>{{$review["rating"]}}</td>
                    <td>{{$review["created_at"]}}</td>
                    <td>{{$review["updated_at"]}}</td>
                    <td>{{$review["film_id"]}}</td>
                    <td>{{$review["user_id"]}}</td>
                </tr>
                @endforeach
                <input type="submit" value="Submit">
                
            </form>
        </tbody>
    </table>

    {{$reviews->links()}}
    <a href="/admin">Go Back</a>
    @endsection
