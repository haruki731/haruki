<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>みんなの投稿</h1>
        <div class='posts'>
            @foreach ($posts as $result)
                <div class='post'>
                    <a href="/posts/{{ $result->id }}"class='title'>{{ $result->title }}</a>
                    <p class='body'>{{ $result->body }}</p>

                </div>
            @endforeach
        </div>
    </body>
</html>