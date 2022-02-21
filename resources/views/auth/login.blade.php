<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form method="POST" action="/login">
        @csrf
        {{-- email --}}
        <input type="email" name="email" placeholder="Email">
        <br>
        {{-- password --}}
        <input type="password" name="password" placeholder="Password">
        <br>
        {{-- Invalid Credentials --}}
        @if (isset($invalidCredentials) && $invalidCredentials == true)
            <div>
                Invalid email or password!
            </div>
            <br>
        @endif
        <button type="submit">Register!</button>
    </form>
</body>

</html>
