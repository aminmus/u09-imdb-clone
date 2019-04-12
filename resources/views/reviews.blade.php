   

      <div class="form-group col-md-8 text-center">
      <form class="justify-content-center" method="POST" action="{{ action('ReviewController@postReview') }}" >
  @csrf
          <label for="formGroupExampleInput2">Another label</label>
          <input name="movie_id" type="hidden" value="<?php echo $body->id;?>"/>
          <textarea type="textarea" class="form-control" id="formGroupExampleInput2" name="content" placeholder="review"></textarea>
          <select class="custom-select col-md-3" id="inputGroupSelect04" name="rating" aria-label="Example select with button addon">
          <option selected>Rating</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>

      <button type="submit" class="btn btn-success">Post</button>
  </form>
      </div>
