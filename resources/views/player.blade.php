<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $player->first_name }} {{ $player->last_name }}</title>
</head>

<body>
    <div>
        <h1>{{ $player->first_name }} {{ $player->last_name }}</h1>
        <h2>{{ $player->email }}</h2>
        <h3><a href="/teams/{{ $player->team_id }}">
                {{ $player->team->name }}
            </a></h3>
    </div>
</body>

</html>
