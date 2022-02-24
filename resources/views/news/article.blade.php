<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $news->title }}</title>
</head>

<body>
    <div>
        <h1>{{ $news->title }}</h1>
        <p>{{ $news->content }}</p>
        <span>posted by {{ $news->user->name }} <em>{{ $news->user->email }}</em></span>
        <ul>
            @foreach ($news->teams as $team)
                <li><a href="../teams/{{ $team->id }}">{{ $team->name }}</a></li>
            @endforeach
        </ul>
    </div>
</body>

</html>
