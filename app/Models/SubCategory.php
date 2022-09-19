<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Category;
use App\Models\Post;

class SubCategory extends Model
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $guarded = [];

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function subCatPost()
    {
      return $this->hasOne(Post::class, 'id', 'category_id');
    }
}
