@extends('welcome')

@section('content')

    <div class="row justify-content-center text-center my-5">
        <form method="POST" action="{{ action('SearchController@advancedsearch') }}">
            @csrf
            <div class="form-group">
                <input class="form-control" type="text" name="year" placeholder="release date">
            </div>
            <div class="form-group">
                <select class="form-control" name="language" id="">
                    <option value="cs">Czech</option>
                    <option value="da">Danish</option>
                    <option value="de">German</option>
                    <option value="et">Estionian</option>
                    <option value="fi">Finnish</option>
                    <option value="fr">French</option>
                    <option value="ga">Irish</option>
                    <option value="id">Indonesian</option>
                    <option value="is">Icelandic</option>
                    <option value="it">Italian</option>
                    <option value="ja">Japanese</option>
                    <option value="cs">Czech</option>
                    <option value="ko">Korean</option>
                    <option value="no">Norwegian</option>
                    <option value="pt">Portuguese</option>
                    <option value="ru">Russian</option>
                    <option value="es">Spanish</option>
                    <option value="sv">Swedish</option>
                    <option value="en">English</option>
                </select>
            </div>
            <div class="form-group">
                <div class="row">
                    <input  style="margin-top: 4px;" type="checkbox" name="horror" value="27"> <p style="margin-right: 5px;">Horror</p>
                    <input  style="margin-top: 4px;" type="checkbox" name="action" value="28"><p style="margin-right: 5px;">Action</p>
                    <input  style="margin-top: 4px;" type="checkbox" name="scifi" value="878"><p style="margin-right: 5px;">Science Fiction</p>
                    <input  style="margin-top: 4px;" type="checkbox" name="adventure" value="12"><p style="margin-right: 5px;">Adventure</p>
                    <input  style="margin-top: 4px;" type="checkbox" name="comedy" value="35"><p style="margin-right: 5px;">Comedy</p>
                    <input  style="margin-top: 4px;" type="checkbox" name="crime" value="80"><p style="margin-right: 5px;">Crime</p>
                    <input  style="margin-top: 4px;" type="checkbox" name="animation" value="16"><p style="margin-right: 5px;">Animation</p>
                    <input  style="margin-top: 4px;" type="checkbox" name="documentary" value="99"><p style="margin-right: 5px;">Documentary</p>
                    <input  style="margin-top: 4px;" type="checkbox" name="drama" value="18"><p style="margin-right: 5px;">Drama</p>
                    <input  style="margin-top: 4px;" type="checkbox" name="fantasy" value="14"><p style="margin-right: 5px;">Fantasy</p>
                    <input  style="margin-top: 4px;" type="checkbox" name="romance" value="10749"><p style="margin-right: 5px;">Romance</p>
                    <input  style="margin-top: 4px;" type="checkbox" name="thriller" value="53"><p style="margin-right: 5px;">Thriller</p>
                    <input  style="margin-top: 4px;" type="submit" value="Submit">
                </div>
            </div>
        </form>
    </div>

@if(isset($body->results))
    <div class="row justify-content-center text-center my-5">
        @foreach ($body->results as $result)
            <div class="col-md-2 text-center">
                <a href="{{ url("selectedfilm/{$result->id}") }}">
                    <img
                    src="{{ url("http://image.tmdb.org/t/p/w185/{$result->poster_path}") }}">
                </a>
                <h4>{{$result->title}} </h4>
            </div>
        @endforeach
    </div>
@endif

@endsection

