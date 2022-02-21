<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $team->name }}</title>
</head>

<body>
    <div>
        <h1>{{ $team->name }}</h1>
        <h2>{{ $team->email }}</h2>
        <h3>{{ $team->address }}, {{ $team->city }}</h3>
        <ul>
            @foreach ($team->players as $player)
                <li><a href="/players/{{ $player->id }}">{{ $player->first_name }} {{ $player->last_name }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</body>

</html>
