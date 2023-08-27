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
        <h1>投稿一覧(フォロー中のみ)</h1>
        
        <a href="/users/{{ Auth::user()->id }}/followees">フォロー数：{{ $followees->count() }}</a>
        <br>
        
        <!--フォロー投稿一覧表示-->
        @foreach ($posts as $post)
            <div class="post" style='border:solid 1px; margin-bottom: 10px;'>
                <p>
                    ユーザー名：<a href="/users/{{$post->user_id}}">{{ $post->user->name }}</a>
                </p>
                <p>
                    タイトル：<a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                </p>
                @if($post->image_url)
                <div>
                    <img src="{{ $post->image_url }}" alt="画像が読み込めません。"/>
                </div>
                @endif
                <p>カテゴリー：<a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a></p>
                <p>大学名：<a href="/universities/{{ $post->university->id }}">{{ $post->university->name }}</a></p>
                <p>♡　{{ $post->likes->count() }}</p>
                <div>
                    @if($post->is_liked_by_auth_user())
                        <a href="/unlike/{{ $post->id }}" class="btn btn-success btn-sm">いいね  <span class="badge">{{ $post->likes->count() }}</span></a>
                    @else
                        <a href="/like/{{ $post->id }}" class="btn btn-secondary btn-sm">いいね  <span class="badge">{{ $post->likes->count() }}</span></a>
                    @endif
                </div>
            </div>
        @endforeach
    </body>
    </x-app-layout>
</html>