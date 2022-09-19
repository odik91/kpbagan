<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Post;
use App\Models\Postimage;
use App\Models\User;

class HomeController extends Controller
{
  public function index()
  {
    $title = 'beranda';
    $categories = Category::orderBy('name', 'asc')->get();
    $limitCategories = Category::orderBy('name', 'asc')->limit(4)->get();
    $randomPosts = Post::inRandomOrder()->limit(9)->get();
    $newPosts = Post::orderBy('id', 'desc')->where('sub_category_id', '>' ,0)->limit(9)->get();
    $hits = Post::orderBy('views', 'desc')->where('sub_category_id', '>' ,0)->limit(2)->get();
    $nextHits = Post::orderBy('views', 'desc')->offset(2)->where('sub_category_id', '>' ,0)->limit(2)->get();
    $newBottomPosts = Post::orderBy('created_at', 'desc')->where('sub_category_id', '>' ,0)->limit(4)->get();
    $sideHits = Post::orderBy('views', 'desc')->offset(2)->where('sub_category_id', '>' ,0)->limit(5)->get();
    return view("display", compact("title", "categories", "limitCategories", "randomPosts", "newPosts", "hits", "nextHits", "newBottomPosts", "sideHits"));
  }
}
