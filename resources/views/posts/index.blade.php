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
        <div class="window">
            <div class="posts-show">
                <h1>投稿一覧</h1>
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
                            @if($post->image_url)
                                <div>
                                    <img src="{{ $post->image_url }}" alt="画像が読み込めません。"/>
                                </div>
                            @endif
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
                    <div>
                        {{ $posts->links() }}
                    </div>
                </div>
                <div class="create-btn-area">
                  <a class="create-btn" href='/posts/create'>新規投稿</a>
                </div>
            </div>
            <div class="side-right">
              
              <form action="/posts/filter" method="GET" class="form5">
                    <div>
                        <h2>カテゴリー</h2>
                        <select name="filter[category_id]" class="select5">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div>
                        <h2>大学名</h2>
                        <select name="filter[university_id]" class="select5">
                            @foreach($universities as $university)
                                <option value="{{ $university->id }}">{{ $university->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="submit" value="検索" class="input5"/>
                </form>
              
            </div>
        </div>
        
                
        
    </body>
    </x-app-layout>
</html>
