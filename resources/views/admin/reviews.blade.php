@extends('welcome')

@section('content')


<h2>Reviews</h2>
{{-- <form method="POST" action="{{ action('AdminController@deleteReview') }}">
@method('DELETE')
@csrf --}}
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
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($reviews as $review)

        <tr>
            <th scope="row">
                {{$review['id']}}<br>
            </th>
            <td>{{$review["content"]}}</td>
            <td>{{$review["rating"]}}</td>
            <td>{{$review["created_at"]}}</td>
            <td>{{$review["updated_at"]}}</td>
            <td>{{$review["film_id"]}}</td>
            <td>{{$review["user_id"]}}</td>
            <td>
                <form action="/deleteReview/{{$review['id']}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" value="Submit">Delete</button>

                </form>
            </td>
            <td>
                <button class="btn btn-primary" data-toggle="modal"
                    data-target="#editModal{{$review['id']}}">Edit</button>
            </td>
        </tr>

        @include('admin.modals.editReview')

        @endforeach
    </tbody>
</table>

{{$reviews->links()}}
<a href="/admin">Go Back</a>
@endsection
