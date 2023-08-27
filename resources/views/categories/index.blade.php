<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h2>カテゴリー:{{ $category_name }} の投稿一覧画面</h2>
        <a href='/'>投稿一覧ページへ戻る</a>
        <div>
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
        </div>
        <div>
            {{ $posts->links() }}
        </div>
    </body>
</html>
