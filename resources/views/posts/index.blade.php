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
        <x-app-layout>
            <x-slot name="header">
                <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                    Home
                </h1>
            </x-slot>
            <a href='/posts/create'>募集する！</a>
            <div class='posts'>
                @foreach($posts as $post)
                    <div class='post'>
                        <h2 class='title'>
                            <a href="/posts/{{$post->id}}">{{$post->title}}</a>
                        </h2> <!-- postクラスのtitleを使う-->
                        <p class='body'>{{$post->body}}</p>
                        <p2>カテゴリー</p2>
                        <a href="">{{ $post->category->name }}</a>
                        <p2>ゲーム名</p2>
                        <a href="">{{ $post->game->name }}</a>
                        <div>
                            @can('isAdmin')
                                <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="deletePost({{ $post->id }})">delete</button> 
                                </form>
                            @else
                            <p>管理者のみ削除できます。</p>
                            @endcan
                        </div>
                    </div>
                @endforeach
            </div>
            <div class='paginate'>{{$posts->links()}}</div>
            <script>
                function deletePost(id) {
                    'use strict'
            
                    if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                        document.getElementById(`form_${id}`).submit();
                    }
                }
            </script>
            {{ Auth::user()->name }}
        </x-app-layout>
    </body>
</html>