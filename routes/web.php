<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// route categories
Route::resource('category', CategoryController::class);

// route all blog set
Route::prefix('artikel')->group(function () {
  Route::get('kategori', [App\Http\Controllers\BlogController::class, 'index'])->name('category.all');
  Route::get('kategori/view/{slug}', [App\Http\Controllers\BlogController::class, 'singleCategory'])->name('category.single');
  Route::get('kategori/artikel/{slug}', [App\Http\Controllers\BlogController::class, 'singlePage'])->name('category.singleArticle');
});
