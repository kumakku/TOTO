<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;


class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts/index')->with(['posts' => $post->getPaginateByLimit()]);
    }

    public function show(Post $post)
    {
        return view('posts/show')->with(['post' => $post]);
    }

    public function create(Category $category)
    {
        return view('posts/create')->with(['categories' => $category->get()]);
    }

    public function store(Post $post, Request $request)
    {
        $input = $request['post'];
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
        $post->fill($input_post)->save();

        return redirect('/posts/' . $post->id);
    }
    
    public function user_prof(User $user)
    {
        $login_user_id = auth()->id();
        $user_id = $user->id;
        // $followers = DB::table('follows')->where('followee_id', $user_id)->get();
        $followers = User::find($user_id)->followers()->orderBy('id')->get();
        $followees = User::find($user_id)->followees()->orderBy('id')->get();
        if (DB::table('follows')->where('followee_id', $user_id)->where('follower_id', $login_user_id)->exists())
        {
            $button_text = "フォロー解除";
        } else {
            $button_text = "フォローする";
        }
        return view('users/user_prof')->with(['followers' => $followers, 'followees' => $followees, 'user' => $user, 'button_text' => $button_text]);
    }
    
    public function user_all_followers(User $user)
    {
        $user_id = $user->id;
        // $followers = DB::table('follows')->where('followee_id', $user_id)->get();
        $followers = User::find($user_id)->followers()->orderBy('id')->get();
        return view('users/user_all_followers')->with(['followers' => $followers, 'user' => $user]);
    }
    
    public function user_all_followees(User $user)
    {
        $user_id = $user->id;
        // $followers = DB::table('follows')->where('followee_id', $user_id)->get();
        $followees = User::find($user_id)->followees()->orderBy('id')->get();
        return view('users/user_all_followees')->with(['followees' => $followees, 'user' => $user]);
    }

    public function comment(Comment $comment, Request $request){
        $input=$request['comment'];
        $comment->fill($input)->save();
        
        return redirect('/posts/' . $comment->post_id);
    }

}
