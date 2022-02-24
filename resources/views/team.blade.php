<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $team->name }}</title>
    <style>
        svg {
            width: 15px;
        }

    </style>
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
    <hr>
    <div>
        <ul>
            @foreach ($news as $item)
                <li><a href="/news/{{ $item->id }}">{{ $item->title }}</a></li>
            @endforeach
        </ul>
        <div>
            {{ $news->links() }}
        </div>
    </div>
    <hr>
    <div>
        <h3>Comments:</h3>
        <ul>
            @foreach ($team->comments as $comment)
                <li>{{ $comment->content }}</li>
            @endforeach
            <li>
                <form method="POST" action="/add/{{ $team->id }}/comment">
                    @csrf
                    <input type="hidden" name="user_id" value={{ auth()->user()->id }}>
                    <textarea name="content" placeholder="Leave a comment..." cols="30" rows="2"></textarea>
                    @error('content')
                        <div>
                            {{ $message }}
                        </div>
                        <br>
                    @enderror
                    <button type="submit">Submit!</button>
                </form>
            </li>
        </ul>
    </div>
</body>

</html>
