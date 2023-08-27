<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'category_id',
    ];

    public function getPaginateByLimit(int $limit_count = 5)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this::with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function likes()
    {
        return $this->hasMany(Like::class);
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
