   
<div class="container">
        <div class="col-md-8">
            <form method="POST" action="{{ action('ReviewController@postReview') }}" >
            @csrf
                <div class="form-group row">
                    <label for="formGroupExampleInput2">Another label</label>
                    <input name="movie_id" type="hidden" value="<?php echo $body->id;?>"/>
                    <input type="text-area" class="form-control" id="formGroupExampleInput2" name="content" placeholder="review">
                    <select class="custom-select col-md-2" id="inputGroupSelect04" name="rating" aria-label="Example select with button addon">
                    <option selected>Rating</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                  </select>
                </div>

                <div class="input-group">
                </div>

                <button type="submit" class="btn btn-success">Post</button>
            </form>
        </div>
    </div>
