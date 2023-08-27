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
                                <a href="/posts/show/{{ $post->id }}">{{ $post->title }}</a>
                            </h2>
                            <div class="detail">  
                              <p class="college"><a href="#">{{ $post->college }}</a></p>
                              <p class="category"><a href="#">[{{ $post->category }}]</a></p>
                            </div>
                            <div class="content">
                              <p>{{ $post->body }}</p>
                            </div>
                            <class="post-img" img src="{{ $post->image }}" alt="画像を表示できません。">
                            <div class="info">
                              <div class="comments">
                                <a href="#">コメント</a>
                              </div>
                                <div class="likes">
                                    @if($post->is_liked_by_auth_user())
                                        <a href="/unlike/{{ $post->id }}" class="btn btn-success btn-sm">いいね  <span>{{ $post->likes->count() }}</span></a>
                                    @else
                                        <a href="/like/{{ $post->id }}" class="btn btn-secondary btn-sm">いいね  <span>{{ $post->likes->count() }}</span></a>
                                    @endif
                                </div>
                              <p>{{ $post->name }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="create-btn-area">
                  <a class="create-btn" href='/posts/create'>新規投稿</a>
                </div>
            </div>
            <div class="side-right">
              <div class="follow-btn-area">
                <a class="follow-btn" href='#'>フォロー中のみ</a>
              </div>

              <form action="#" method="post"> 
                <select name="post[category]">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <select name="post[callege]">
                    @foreach ($universities as $university)
                        <option value="{{ $university->id }}">{{ $university->name }}</option>
                    @endforeach
                </select>
                <input type="submit" value="絞り込む">
              </form>
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
