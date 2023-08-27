<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <h2>投稿作成</h2>
<!--これまであったコード        <form action="/posts" method="POST">　-->
        <form action="/posts" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="post[user_id]" value="{{Auth::id()}}">
            <div>
                <h2>タイトル</h2>
                <input type="text" name="post[title]" placeholder="タイトル" value="{{ old('post.title') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div>
            <div>
                <h2>投稿内容</h2>
                <textarea name="post[body]" placeholder="今日も1日お疲れさまでした。">{{ old('post.body') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
            
            <!--画像をアップロード-->
            <div class="image">
                <input type="file" name="image">
            </div>
            
            <div>
                <h2>カテゴリー</h2>
                <select name="post[category_id]">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div>
                <h2>大学名</h2>
                <select name="post[university_id]">
                    @foreach($universities as $university)
                        <option value="{{ $university->id }}">{{ $university->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <input type="submit" value="投稿"/>
        </form>
        <div><a href="/">一覧に戻る</a></div>
    </body>
    </x-app-layout>
</html>
