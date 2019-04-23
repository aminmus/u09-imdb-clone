@extends('welcome')

@section('content')

<div class="container-fluid">

    <h2>Reviews</h2>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">@sortablelink('id')</th>
                <th scope="col">@sortablelink('content')</th>
                <th scope="col">@sortablelink('rating')</th>
                <th scope="col">@sortablelink('created_at')</th>
                <th scope="col">@sortablelink('updated_at')</th>
                <th scope="col">@sortablelink('movie_id')</th>
                <th scope="col">@sortablelink('user_id')</th>
                <th scope="col">@sortablelink('is_approved')</th>
                <th><a href="/admin/add/review" class="btn btn-success">Add new review</a></th>
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
                <td>{{$review["movie_id"]}}</td>
                <td>{{$review["user_id"]}}</td>
                <td>{{$review["is_approved"]}}</td>
                <td>

                    <form action="{{ action('AdminController@deleteReview', [$review['id']]) }}" method="post">
                        @method('DELETE')
                        @csrf
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

</div>

@endsection
