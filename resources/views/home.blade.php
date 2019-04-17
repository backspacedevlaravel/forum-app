<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons' rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>BSD Forum</title>
</head>
<body>
    <div id="app">
        <v-app>
            <app-home></app-home>
        </v-app>
    </div>

    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>