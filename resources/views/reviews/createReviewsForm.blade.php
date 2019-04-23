


<div class="test">
  <div class="column">

    <form method="POST" action="{{ action('ReviewController@postReview') }}">
        @csrf
            <label for="formGroupExampleInput2">Review</label>
        <div>
            <input name="movie_id" type="hidden"
                value="<?php echo $body->id;?>" />
            <textarea class="col-md-8" type="text-area"  id="formGroupExampleInput2" name="content"
                placeholder="review" >
                </textarea>
                </div>
                <div>
            <select id="inputGroupSelect04" name="rating"
                aria-label="Example select with button addon">
                <option selected>Rating</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            </div>
            <div>
        <button type="submit" class="btn btn-success">Post</button>
        </div>
    </form>
    </div>
</div>
