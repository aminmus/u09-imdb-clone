<div class="modal fade" id="editModal{{$review['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
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
                        <select class="custom-select col-md-12 form-control" id="inputGroupSelect04" name="rating"
                            aria-label="Example select with button addon">

                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="created_at">Created At</label>
                        <input class="form-control" type="text" name="created_at" value="{{$review['created_at']}}">
                    </div>

                    <div class="form-group">
                        <label for="updated_at">Updated At</label>
                        <input class="form-control" type="text" name="updated_at" value="{{$review['updated_at']}}">
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
                <button type="button" class="btn btn-sm btn-outline-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-sm btn-outline-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
