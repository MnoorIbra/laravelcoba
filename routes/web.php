<?php

use App\Http\Controllers\DashboardPostController;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;


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

Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "nama" => "Muhammad Noor Ibrahim",
        "email" => "Muhnibra@gmail.com",
        "image" => "pas poto.jpg"
    ]);
});



Route::get('/blog', [PostController::class, 'index']);

Route::get('/categories', function() 
{
    return view('categories', [
        'title' => 'Post Categories',
        'category' => Category::all()
    ]);
});
//halaman single post

Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function(){
    return view('categories', [
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/categories/{category:slug}', function(Category $category){
    return view('blog', [
        'title' => "Post by Category : $category->name",
        'posts' => $category->posts->load('category', 'user')
    ]);
});

Route::get('/authors/{author:username}', function(User $author){
    return view('blog', [
        'title' => "Post By Author : $author->name",
        'posts' => $author->posts->load('user', 'category')
    ]);
});

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');

 
Route::get('/dashboard/posts.checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

