<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style2.css">
    <title>Авторизація/Зеєстрація</title>

</head>
{{--<body background="voda_volny_riab_143522_1366x768.jpg">--}}
<header>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
</header>

<body>
<div class="container mt-4">
    <h1 align="center">Форма реєстрації та авторизації</h1><br>
    <div class="row">

        <div class="col">

            {{--<form>--}}
            <form action="{{route('home')}}" method="post" name="зареєструвати" value="1">
                <input type="text" class="form-control" name="name" id="name" placeholder="Введіть ім'я"><br>
                <input type="text" class="form-control" name="email" id="email" placeholder="Введіть email"><br>
                <input type="password" class="form-control" name="pass" id="pass" placeholder="Введіть пароль"><br>
                <button type="submit" class="btn btn-success" name="зареєструвати" value="1">Зареєструватись</button>
                {{--<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />--}}
            </form>
        </div>


        <div class="col">

            {{--<form>--}}
            <form action="{{route('home2')}}" method="post" name="Авторизувати" value="2">
                <input type="text" class="form-control" name="name2" id="name2" placeholder="Введіть ім'я"><br>
                <input type="text" class="form-control" name="email2" id="email2" placeholder="Введіть email"><br>
                <input type="password" class="form-control" name="pass2" id="pass2" placeholder="Введіть пароль"><br>
                <button type="submit" class="btn btn-success " name="Авторизувати" value="2">Авторизуватись</button>
            </form>
        </div>
    </div>
</div>

</body>

</html>
