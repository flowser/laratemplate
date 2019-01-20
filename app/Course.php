<?php

namespace App;

use App\User;
use App\Category;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'user_id', 'category_id', 'comment_id','title', 'description', 'photo'
    ];

    public function user()
    {
        return $this ->belongsTo(User::class);
    }

    public function category()
    {
        return $this ->belongsTo(Category::class);
    }
    // public function comment()
    // {
    //     return $this ->belongsTo(Comment::class);
    // }


}
