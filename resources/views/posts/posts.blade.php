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
                    <form action="/posts/{{ $result->id }}" id="form_{{ $result->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $result->id }})">delete</button> 
                    </form>
                </div>
            @endforeach
        </div>
        <script>
            function deletePost(id) {
                'use strict'

                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
        <div class="footer">
            <a href="/posts/result">[ 積分値を求める画面へ ]</a>
        </div>
    </body>
</html>