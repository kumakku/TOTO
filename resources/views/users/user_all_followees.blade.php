<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <x-app-layout>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>{{ $user->name }}フォロー一覧</h1>
        
        <p>フォロー数：{{ $followees->count() }}</p>
        
        <!--フォロー一覧表示-->
        @foreach ($followees as $followee)
            <a href="/users/{{ $followee->id }}">{{ $followee->name }}</a> <br>
        @endforeach
    </body>
    </x-app-layout>
</html>