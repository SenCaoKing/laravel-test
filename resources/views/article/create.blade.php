<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>{{ $title }} --- laravel练习 By Sen</title>
    </head>
    <body>
    <form action="{{ url('view/store') }}" method="post">
        {{ csrf_field() }}
        <input type="text" name="title" value="" /><br>
        <input type="text" name="content" value="" /><br>
        <button type="submit">提交</button>
    </form>
    </body>
</html>