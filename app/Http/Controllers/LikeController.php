<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class LikeController extends Controller
{
    // only()の引数内のメソッドはログイン時のみ有効
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->only(['like', 'unlike']);
    }
    
    // 引数のIDに紐づくリプライにLIKEする
    public function like($id)
    {
        Like::create([
            'post_id' => $id,
            'user_id' => Auth::id(),
        ]);
        
        session()->flash('success', 'You Liked the Reply.');
        
        return redirect()->back();
    }
    
    //引数のIDに紐づくリプライにUNLIKEする
    public function unlike($id)
    {
        $like = Like::where('post_id', $id)->where('user_id', Auth::id())->first();
        $like->delete();
        
        session()->flash('success', 'You Unliked the Reply.');
        
        return redirect()->back();
    }
}
