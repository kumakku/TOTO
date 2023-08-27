<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <div class="center1">
            <div class="center2">
                <h2 class="title">編集画面</h2>
                <div style='border:solid 1px; margin-bottom: 10px;'>
                    <form action="/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    <div class="ml-4">
                        <div class='content__title'>
                            <br>
                            <h2>タイトル</h2>
                            <input type='text' name='post[title]' value="{{ $post->title }}">
                        </div>
                        <div class='content__body'>
                            <br>
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
                        <br>
                        <br>
                        </div>
                    </div>
                </div>
                        <input type="submit" class="form-submit" value="編集完了">
                    </form>
            </div>
        </div>
    </body>
    </x-app-layout>
</html>
