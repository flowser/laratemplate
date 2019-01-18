<?php

namespace App;

use App\Course;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
