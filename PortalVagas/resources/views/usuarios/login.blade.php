<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    @include('components.header')

    <div class="container">
        <h1>Login</h1>
        <form method="POST" action="{{ route('usuarios.login') }}">
            @csrf


            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" required autofocus>
            </div>


            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" name="password" class="form-control" required>
            </div>


            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>


</body>
</html>
