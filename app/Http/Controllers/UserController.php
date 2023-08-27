<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Models\Comment;
use App\Models\Fo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function my_prof(){
        return $this->user_prof(Auth::user());
    }
    
    public function user_prof(User $user)
    {
        $login_user_id = auth()->id();
        $user_id = $user->id;
        // $followers = DB::table('follows')->where('followee_id', $user_id)->get();
        $followers = User::find($user_id)->followers()->orderBy('id')->get();
        $followees = User::find($user_id)->followees()->orderBy('id')->get();
        // $posts = DB::table('posts')->where('user_id', $user_id)->get();
        $posts = Post::where('user_id', $user_id)->get();
        if (DB::table('follows')->where('followee_id', $user_id)->where('follower_id', $login_user_id)->exists())
        {
            $button_text = "フォロー解除";
        } else {
            $button_text = "フォローする";
        }
        return view('users/user_prof')->with(['followers' => $followers, 'followees' => $followees, 'user' => $user, 'button_text' => $button_text, 'posts' => $posts]);
    }
    
    public function follow(User $followee){
        $user=Auth::user();
        
        $user->followees()->sync($followee->id,false);
        
        return redirect()->back();
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
}
