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

        {{-- </form> --}}

        {{-- editModal --}}
        <div class="modal fade" id="editModal{{$review['id']}}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/admin/review/update/{{$review['id']}}">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">
                                <label for="id">ID</label>
                                <input class="form-control" type="text" name="id" value="{{$review['id']}}">
                            </div>

                            <div class="form-group">
                                <label for="content">Content</label>
                                <input class="form-control" type="text" name="content" value="{{$review['content']}}">
                            </div>

                            <div class="form-group">
                                <label for="rating">Rating</label>
                                <select class="custom-select col-md-12 form-control" id="inputGroupSelect04"
                                    name="rating" aria-label="Example select with button addon">

                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="created_at">Created At</label>
                                <input class="form-control" type="text" name="created_at"
                                    value="{{$review['created_at']}}">
                            </div>

                            <div class="form-group">
                                <label for="updated_at">Updated At</label>
                                <input class="form-control" type="text" name="updated_at"
                                    value="{{$review['updated_at']}}">
                            </div>


                            <div class="form-group">
                                <label for="film_id">Film ID</label>
                                <input class="form-control" type="text" name="film_id" value="{{$review['film_id']}}">
                            </div>

                            <div class="form-group">
                                <label for="user_id">User ID</label>
                                <input class="form-control" type="text" name="user_id" value="{{$review['user_id']}}">
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-outline-secondary"
                            data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-sm btn-outline-primary">Save changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </tbody>
</table>

{{$reviews->links()}}
<a href="/admin">Go Back</a>
@endsection
