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
        <h1>{{ $user->name }}フォロワー一覧</h1>
        
        <p>フォロワー数：{{ $followers->count() }}</p>
        
        <!--フォロワー名一覧表示-->
        @foreach ($followers as $follower)
            <a href="/users/{{ $follower->id }}">{{ $follower->name }}</a> <br>
        @endforeach
    </body>
    </x-app-layout>
</html>