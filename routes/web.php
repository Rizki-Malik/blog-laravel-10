<?php

use App\Http\Controllers\AdminCategoryController;
use App\Models\Category;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home', [
        "title" => "Beranda",
        "logo_nav" => "img/logo-white.png",
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "name" => "Muhammad Rizki Malik Aziz",
        "email" => "rimali.qwerty@gmail.com",
        "image" => "img/pp.png",
        "logo_nav" => "img/logo-white.png",
        "logo" => "img/logo.png",
        "title" => "Tentang",
    ]);
});


Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);


Route::get('/categories', function() {
    return view('categories', [
        'title' => 'Post Categories',
        'categories' => Category::all(),
        "logo_nav" => "img/logo-white.png",
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function(){
    return view('dashboard.index', [
        "title" => "Dashboard",
        "image" => "pp.png",
        "logo_nav" => "img/logo-white-dashboard.png",
    ]);
})->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)
->except('show')->middleware('admin');

// Route::get('/category/{category:slug}', function(Category $category) {
//     return view('posts', [
//         'title' => "Category : $category->name",
//         'posts' => $category->posts->load('category', 'author'),
//         "active" => "categories",
//     ]);
// });

// Route::get('/authors/{author:username}', function(User $author) {
//     return view('posts',[
//         'title' => "Post by Author : $author->name",
//         "active" => "blog",
//         'posts' => $author->posts->load('category', 'author'),
//     ]);
// });