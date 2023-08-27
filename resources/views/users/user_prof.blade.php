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
        @if (auth()->id() == $user->id)
            @php $title_suffix = " (MyPage)"; @endphp
        @else
            @php $title_suffix = ""; @endphp
        @endif
        
        <h1>{{ $user->name.$title_suffix }}</h1>
        
        <!--フォロワー数-->
        <a href="/users/{{ $user->id }}/followers">フォロワー数：{{ $followers->count() }}</a>
        <br>
        <!--フォロー数-->
        <a href="/users/{{ $user->id }}/followees">フォロー数：{{ $followees->count() }}</a>
        <br>
        
        @if (auth()->id() == $user->id)
            <!--自分自身のページの場合はフォローボタンは不要-->
        @else
            <button type="button" name="follow">{{ $button_text }}</button>
            <br>
        @endif
        
        投稿一覧を載せる予定
    </body>
    </x-app-layout>
</html>