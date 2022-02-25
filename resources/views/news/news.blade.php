<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        svg {
            width: 20px;
        }

    </style>
</head>

<body>

    @if (session()->has('flashMessage'))
        <div id="message">
            {{ session('flashMessage') }}
        </div>
    @endif
    <div class="d-flex">

        <div class="d-flex flex-column p-3 bg-light">
            <ul class="nav nav-pills flex-column mb-auto">
                @foreach ($sharedTeams as $team)
                    <li class="nav-item">
                        <a href="/news/teams/{{ $team->id }}" class="nav-link link-dark" aria-current="page">
                            {{ $team->name }}
                    </li>
                @endforeach
            </ul>
        </div>
        <div>
            <div>
                @foreach ($news as $item)
                    <h2><a href="/news/{{ $item->id }}">{{ $item->title }}</a>
                    </h2>
                    <span>posted by {{ $item->user->name }} <em>{{ $item->user->email }}</em></span>
                    <hr>
                    <br>
                @endforeach
            </div>
            <div>
                {{ $news->links() }}
            </div>
        </div>
    </div>

</body>
<script>
    let msg = document.querySelector('#message');
    setTimeout(() => {
        if (msg) {
            msg.style.display = 'none'
        }
    }, 3000);
</script>

</html>
