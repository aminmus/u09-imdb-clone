@extends('welcome')


@section('content')

   @foreach ($filmsFromWatchlist as $film)
    <div id="ajaxreload">
       <h1>{{$film->title}}</h1>
       <p>{{$film->movie_id}}</p>
                                                                                        
           <button id="submit" class="btn btn-danger mt-2"type="submit" value="<?php echo $film->id;?>">Delete</button>
       <hr>
    </div>
   @endforeach

   <script>
    var deleteButton = document.getElementById("submit").onclick = function(e) {
        console.log(e.target.value);
        var id = e.target.value;
        var ajaxurl = '{{route('testingajax', ':id')}}';
        ajaxurl = ajaxurl.replace(':id', id);
        $.ajax({
            url: ajaxurl,
            type: "POST",
            success: function(data) {
                /* $data = $(data);
                document.getElementsByClassName("ajaxreload").closest.
                deleteButton.closest
                $"" */
                console.log("halleluljah");
            }
        })
    }</script>            

   
@endsection