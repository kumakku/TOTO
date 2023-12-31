<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Category;
use App\Models\University;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Cloudinary;  //dev4_画像アップロード


class PostController extends Controller
{
    public function index(Post $post,Category $category,University $university)
    {
        return view('posts/index')->with([
            'posts' => $post->getPaginateByLimit(),
            'categories' => $category->get(),
            'universities' => $university->get()]);
    }
    
    public function index_filter(Post $post,Category $category,University $university,Request $request)
    {
        $input=$request['filter'];
        $post=$post->where('category_id',$input['category_id'])->where('university_id',$input['university_id'])->orderBy('updated_at', 'DESC')->paginate(5);
        return view('posts/index')->with([
            'posts' => $post,
            'categories' => $category->get(),
            'universities' => $university->get()]);
    }

    public function show(Post $post)
    {
        return view('posts/show')->with(['post' => $post]);
    }

    public function create(Category $category, University $university)
    {
        return view('posts/create')->with([
            'categories' => $category->get(),
            'universities' => $university->get()]);
    }

    public function store(Post $post, PostRequest $request)
    {
        $input = $request['post'];
        if($request->file('image')){ //画像ファイルが送られた時だけ処理が実行される
            $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            $input += ['image_url' => $image_url];
            }
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }

    public function edit(Post $post)
    {
        return view('posts/edit')->with(['post' => $post]);
    }

    public function update(Request $request, Post $post)
    {
        $input_post = $request['post'];
        if($request->file('image')){ //画像ファイルが送られた時だけ処理が実行される
            $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
            $input_post += ['image_url' => $image_url];
            }
        $post->fill($input_post)->save();

        return redirect('/posts/' . $post->id);
    }

    public function comment(Comment $comment, Request $request){
        $input=$request['comment'];
        $comment->fill($input)->save();
        
        return redirect('/posts/' . $comment->post_id);
    }

}