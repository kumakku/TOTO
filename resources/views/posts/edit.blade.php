<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <h1 class="title">編集画面</h1>
        <div class="content">
            <form action="/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class='content__title'>
                    <h2>タイトル</h2>
                    <input type='text' name='post[title]' value="{{ $post->title }}">
                </div>
                <div class='content__body'>
                    <h2>本文</h2>
                    <input type='text' name='post[body]' value="{{ $post->body }}">
                </div>

                @if($post->image_url)
                <div>
                    <img src="{{ $post->image_url }}" alt="画像が読み込めません。"/>
                </div>
                @endif
                <div class="image">
                <input type="file" name="image">
                </div>

                <input type="submit" value="保存">
            </form>
        </div>
    </body>
    </x-app-layout>
</html>
