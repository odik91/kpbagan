<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class BlogController extends Controller
{
  /**
   * Handle the incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function __invoke(Request $request)
  {
    return "Welcome";
  }

  public function index()
  {
    $title = 'Kategori';
    $categories = Category::orderBy('name', 'asc')->get();
    $trends = $sideHits = Post::orderBy('views', 'desc')->where('sub_category_id', '>', 0)->limit(5)->get();
    return view('blog.allCategories', compact('title', 'categories', 'trends'));
  }

  public function singleCategory($slug)
  {
    $category = Category::where('slug', $slug)->first();
    $posts = Post::orderBy('updated_at', 'desc')->where('category_id', $category['id'])->paginate(4);
    $title = $category['name'];
    $trends = [];
    return view('blog.singleCategory', [
      'posts' => $posts,
      'title' => $title,
      'trends' => $trends
    ]);
  }

  public function singlePage($slug)
  {
    $post = Post::where('slug', $slug)->first();
    $trends = Post::orderBy('views', 'desc')->limit(5)->get();
    return view('blog.singlePost', compact('post', 'trends'));
  }
}
