<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
            display: inline-block;
            width: 70%;
            padding-top: 50px;
        }

        nav {
            display: inline-block;
            width: 30%;
            vertical-align: top;
        }

        nav div {
            padding:10px;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .avatar {
            width: 100px;
        }

        table {
            width: 100%;
        }
    </style>
</head>
<body>
<nav>
    <div>
        Menu:
        <ul>
            <li><a href="/">Repository contributors lookup</a></li>
            <li><a href="/recent-searches">Recently conducted searches</a></li>
        </ul>
    </div>
</nav><div class="content">
    @yield('content')
</div>
</body>
</html>
