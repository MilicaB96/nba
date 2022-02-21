<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div>
        <form method="POST" action="/register">
            @csrf
            {{-- name --}}
            <input type="text" required name="name" placeholder="Name">
            <br>
            @error('name')
                <div>
                    {{ $message }}
                </div>
                <br>
            @enderror
            {{-- email --}}
            <input type="email" required name="email" placeholder="Email">
            <br>
            @error('email')
                <div>
                    {{ $message }}
                </div>
                <br>
            @enderror
            {{-- password --}}
            <input type="password" required name="password" placeholder="Password">
            <br>
            @error('password')
                <div>
                    {{ $message }}
                </div>
                <br>
            @enderror
            {{-- password confirmation --}}
            <input type="password" required name="password_confirmation" placeholder="Confirm password">
            <br>
            @error('password_confirmation')
                <div>
                    {{ $message }}
                </div>
                <br>
            @enderror
            <button type="submit">Register!</button>

        </form>
    </div>
</body>

</html>
