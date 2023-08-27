<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="posts-show">
                <h1>投稿一覧</h2>
                <a href='/posts/create'>新規投稿</a>
                <div class="posts">
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
                    </div>
                <div>
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
        
        <form action="/posts/filter" method="GET">
            <div>
                <h2>カテゴリー</h2>
                <select name="filter[category_id]">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div>
                <h2>大学名</h2>
                <select name="filter[university_id]">
                    @foreach($universities as $university)
                        <option value="{{ $university->id }}">{{ $university->name }}</option>
                    @endforeach
                </select>
            </div>
            <input type="submit" class="form-submit" value="検索"/>
        </form>
        
    </body>
    </x-app-layout>
</html>
