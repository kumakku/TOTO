<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'post_id',
        'user_id',
    ];
    
    public function post()
    {
      return $this->belongsTo(Post::class);
    }

    public function user()
    {
    return $this->belongsTo(User::class);
    }
    
    public function getFollowingCount(User $user)
    {
        // 指定した投稿をいいねしているユーザーの人数を返す
        return $this::find($post->id)->count();
    }
}
