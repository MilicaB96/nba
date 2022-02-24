<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create news</title>
</head>

<body>
    <div>
        <h1>Create a news article: </h1>
        <br>
        <form method="POST" action="/create/news">
            @csrf
            <input type="text" placeholder="Title" name="title" value={{ old('title') }}>
            <br>
            <textarea name="content" placeholder="Write something ..." cols="30" rows="10">
                {{ old('content') }}
            </textarea>
            <br>
            <div>
                Select teams:
                @foreach ($teams as $team)
                    <input type="checkbox" name="teams[]" id="team-{{ $team->id }}" value="{{ $team->id }}">
                    <label for="team-{{ $team->id }}">{{ $team->name }}</label>
                @endforeach
            </div>
            <br>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>

</html>
