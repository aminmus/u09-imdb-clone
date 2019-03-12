<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


</head>

<body>
    <div>
        <form action="/search">
            <label for="search">Search for movie</label>
            <input type="text" name="search" id="search">
            <button type="submit">Submit</button>
        </form>
    </div>
</body>

</html>
