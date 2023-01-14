<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}"> <!-- langはconfig/app.phpの中のlocaleで指定しているため、それをgetする。-->
    <head>
        <meta charset="utf-8">
        <title>
            Blog
        </title>
        <!-- Fonts -->
        <!-- これでコメントアウトする。-->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        @foreach ($twitter as $twitter)                
            {{ $twitter->text }}<br>                
        @endforeach
    </body>
</html>