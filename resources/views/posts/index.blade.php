<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <style>
            .container {
                display: flex;
                margin: 20px;
            }
            
            h1 {
                font-size: 2rem;
                margin-bottom: 30px;
            }
            
            .posts-show {
                width: 80%;
            }
            
            .posts {
                width: 50%;
                min-width: 300px;
                margin: 0 auto;
            }
            
            .post {
                padding: 20px;
            }
            
            .side-right {
                width: 20%;
            }
            
            .btn {
                display: inline-block;
                padding: 10px;
                border: 1px solid #000;
            }
        </style>
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
                                タイトル：<a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                            </p>
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
            </div>
            <div class="side-right">
                
            </div>
        </div>
    </body>
    </x-app-layout>
</html>
