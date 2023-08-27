<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'body',
        'image_url',//dev4_画像アップロード
        'category_id',
    ];
  
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
  
    public function user(){
        return $this->belongsTo(User::class);
    }
  
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getPaginateByLimit(int $limit_count = 5)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this::with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }

    
    
    //投稿にいいねが付いているかの判定
    public function is_liked_by_auth_user()
    {
        $id = Auth::id();
        
        $likers = array();
        foreach($this->likes as $like) {
            array_push($likers, $like->user_id);
        }
        
        if (in_array($id, $likers)) {
            return true;
        } else {
            return false;
        }

    
    }
    
}
