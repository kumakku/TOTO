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
        <div class="center1">
            <div class="center2">
                <h1>詳細画面</h1>
                <div style='border:solid 1px; margin-bottom: 10px;'>
                    <p>
                        ユーザー名：<a href="/users/{{$post->user_id}}">{{ $post->user->name }}</a>
                    </p>
                    <p>タイトル：{{ $post->title }}</p>
                    <p>本文：{{ $post->body }}</p>
                    @if($post->image_url)
                        <div>
                            <img src="{{ $post->image_url }}" alt="画像が読み込めません。"/>
                        </div>
                    @endif
                    <p>カテゴリー：<a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a></p>
                    <p>大学名：<a href="/universities/{{ $post->university->id }}">{{ $post->university->name }}</a></p>
                    @if($post->user_id==auth()->id())
                    <p class="edit">[<a href="/posts/{{ $post->id }}/edit">編集</a>]</p>
                    @endif
                </div>
                <div>
                    <a href="/">戻る</a>
                </div>
                
                <br>
                
                <div class="input_comment">
                    <form action="/posts/comment" method="POST">
                        @csrf
                        <input type="hidden" name="comment[user_id]" value="{{Auth::id()}}">
                        <input type="hidden" name="comment[post_id]" value="{{$post->id}}">
                        <label for="comment" class="form-label">コメント</label>
                        <textarea id="comment" class="form-textarea" name="comment[body]" placeholder="コメントを入力してください" value="{{old('comment.body')}}" required></textarea>
                        <input type="submit" class="form-submit" value="投稿"/>
                    </form>
                </div>
                
                <br>
                
                <div class="comments">
                    @foreach($post->comments as $comment)
                    <div style='border:solid 1px; margin-bottom: 10px;'>
                        <div>
                            <p>
                                <a href="{{route('user_prof',['user'=>$comment->user_id])}}">
                                    {{$comment->user->name}}
                                </a>
                            </p>
                        </div>
                        <div>
                            <p>
                                {{$comment->body}}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </body>
    </x-app-layout>
</html>