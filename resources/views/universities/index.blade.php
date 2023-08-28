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
        <h2>大学名:{{ $university_name }} の投稿一覧画面</h2>
        <a href='/'>投稿一覧ページへ戻る</a>
        <div class="posts">
            @foreach ($posts as $post)
                <div class="post">
                    <h2>
                        <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </h2>
                    <div class="detail">  
                      <p class="college"><a href="/universities/{{$post->university->id}}">{{ $post->university->name }}</a></p>
                      <p class="category"><a href="/categories/{{$post->category->id}}">[{{ $post->category->name }}]</a></p>
                    </div>
                    <div class="content">
                      <p>{{ $post->body }}</p>
                    </div>
                    <class="post-img" img src="{{ $post->image }}" alt="画像を表示できません。">
                    <div class="info">
                      <div class="comments">
                        <a href="/posts/{{ $post->id }}">コメント</a>
                      </div>
                        <div class="likes">
                            @if($post->is_liked_by_auth_user())
                                <a href="/unlike/{{ $post->id }}" class="btn btn-success btn-sm">いいね  <span>{{ $post->likes->count() }}</span></a>
                            @else
                                <a href="/like/{{ $post->id }}" class="btn btn-secondary btn-sm">いいね  <span>{{ $post->likes->count() }}</span></a>
                            @endif
                        </div>
                      <p>
                          <a href="/users/{{ $post->user_id }}">{{ $post->user->name }}
                              
                          </a></p>
                    </div>
                </div>
            @endforeach
        </div>
        <div>
            {{ $posts->links('vendor.pagination.semantic-ui') }}
        </div>
    </body>
    </x-app-layout>
</html>
