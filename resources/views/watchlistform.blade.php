<h1>Create Watchlist</h1>
<form method="POST" action="/watchlist">
    @csrf
    <label for="name">Genre name:</label>
    <input type="text" name="name" placeholder="genre">
    <button type="submit">Submit</button>
</form>