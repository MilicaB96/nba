<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teams</title>
</head>

<body>
    <div>
        <form method="POST" action="/logout">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
    <div>
        <h1>Teams:</h1>
        <ul>
            @foreach ($teams as $team)
                <li><a href="teams/{{ $team->id }}">{{ $team->name }}</a></li>
            @endforeach
        </ul>
    </div>
</body>

</html>
