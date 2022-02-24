<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>News</title>
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
