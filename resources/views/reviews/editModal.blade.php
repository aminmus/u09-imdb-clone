<!-- edit modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <form method="POST" action="/reviews/{{$review->id}}">
                    @csrf
                    @method('PUT')
                    {{-- <input name="movie_id" type="hidden" class="mb-2"value="{{$review->id}}"/> --}}
                    <input type="text-area" class="form-control" id="formGroupExampleInput2" name="content"
                        placeholder="review" class="mb-2" value="{{$review->content}}">
                    <select class="custom-select col-md-2 mt-1" id="inputGroupSelect04" name="rating"
                        aria-label="Example select with button addon">
                        <option selected="{{$review->rating}}">Rating</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
