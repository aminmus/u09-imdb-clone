


<form method="POST" action="{{ route('test.testing') }}">
     
    <input type="text" name="search">
    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
    <button type="submit">Search Movie</button>
</form>



<button>Save movie</button>
