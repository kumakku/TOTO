<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <x-app-layout>
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <div class="center1">
            <div class="center2">
                <h2>新規投稿</h2>
                <div style='border:solid 1px; margin-bottom: 10px;'>
                <form action="/posts" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="post[user_id]" value="{{Auth::id()}}">
                    <div class="ml-4">
  
                      <div>
                          <br>
                          <h2>タイトル</h2>
                          <div class="rounded-lg">
                          <input type="text" name="post[title]" placeholder="タイトル" value="{{ old('post.title') }}"/>
                          </div>
                          <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
                      </div>
                      <div>
                          <br>
                          <h2>本文</h2>
                          <textarea name="post[body]" placeholder="ここに投稿内容を書こう">{{ old('post.body') }}</textarea>
                          <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
                      </div>

                      <!--画像をアップロード-->
                      <div class="image">
                          <input type="file" name="image">
                      </div>

                      <div>
                          <br>
                          <h2>カテゴリー</h2>
                          <select name="post[category_id]">
                              @foreach($categories as $category)
                                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                              @endforeach
                          </select>
                      </div>

                      <div>
                          <br>
                          <h2>大学名</h2>
                          <select name="post[university_id]">
                              @foreach($universities as $university)
                                  <option value="{{ $university->id }}">{{ $university->name }}</option>
                              @endforeach
                          </select>
                          <br>
                          <br>
                      </div>
                    
                    </div>
                </div>
                    <input type="submit" class="form-submit" value="投稿"/>
                    <br>
                    <br>
                    <div><a href="/">投稿一覧に戻る</a></div>
                </form>
            </div>
        </div>
    </body>
    </x-app-layout>
</html>
