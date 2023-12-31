<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function getByUniversity(int $limit_count = 5)
    {
        return $this->posts()->with('university')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
