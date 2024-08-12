<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


    <div class="container">
        <h2>Dashboard - Usuários </h2>
        <form action="{{route('usuarios.logout')}}" method="post">
            <input type="submit" value="Sair">
        </form>

    </div>


</body>
</html>
