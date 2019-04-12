@extends('welcome')

@section('content')
    
<h2>Watchlists</h2>
{{-- <form method="POST" action="{{ action('AdminController@deleteWatchlist') }}">
    @method('DELETE')
    @csrf --}}
    <table class="table">
        <thead>
            <tr>
                <th scope="col">@sortablelink('id')</th>
                <th scope="col">@sortablelink('name')</th>
                <th scope="col">@sortablelink('created_at')</th>
                <th scope="col">@sortablelink('updated_at')</th>
                <th scope="col">@sortablelink('user_id')</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($watchlists as $watchlist)
            
            <tr>
                <th scope="row"> {{$watchlist['id']}}
                </th>
                <td>{{$watchlist["name"]}}</td>
                <td>{{$watchlist["created_at"]}}</td>
                <td>{{$watchlist["updated_at"]}}</td>
                <td>{{$watchlist["user_id"]}}</td>
                <td>
                    <form method="POST" action="/deleteWatchlist/{{$watchlist['id']}}">
                    @method('DELETE')
                    @csrf
                        <button type="submit">Delete</button>
                    </form>
                </td>
                <td>
                        <button data-toggle="modal" data-target="#editModal{{$watchlist['id']}}">Edit</button>
                </td>
            </tr>

            <div class="modal fade" id="editModal{{$watchlist['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <form method="POST" action="/admin/watchlist/update/{{$watchlist['id']}}" >
                                        @csrf
                                        @method('PATCH')

                                        <div class="form-group">
                                            <label for="id">ID</label>
                                        <input type="text" name="id" class="form-control" value="{{$watchlist['id']}}">
                                        </div>

                                        <div class="form-group">
                                            <label for="namn">Name</label>
                                        <input type="text" name="name" class="form-control" value="{{$watchlist['name']}}">
                                        </div>

                                        <div class="form-group">
                                            <label for="created_at">Created At</label>
                                        <input type="text" name="created_at" class="form-control" value="{{$watchlist['created_at']}}">
                                        </div>

                                        <div class="form-group">
                                            <label for="updated_at">Updated At</label>
                                        <input type="text" name="updated_at" class="form-control" value="{{$watchlist['updated_at']}}">
                                        </div>

                                        <div class="form-group">
                                            <label for="user_at">User Id</label>
                                        <input type="text" name="user_id" class="form-control" value="{{$watchlist['user_id']}}">
                                        </div>
                                        <div class="modal-footer">
                                                <button type="button" class="btn btn-sm btn-outline-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-sm btn-outline-primary">Save changes</button>
                                            </div>
                                </form>
                            </div>
                        </div>
                    </div>
            @endforeach
            {{-- <input type="submit" value="Submit"> --}}
        {{-- </form> --}}
    </tbody>
</table>
{{ $watchlists->links() }}

<a href="/admin">Go Back</a>
@endsection
