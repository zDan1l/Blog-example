<?php

use App\Http\Controllers\AdminCategoryController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;

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
    return view('home',[
        "title" => 'Home',
        "active" => 'home'
    ]);
});

Route::get('/about', function () {
    return view('about',[
        "title" => "About",
        "name" => "Ziyaa Danil Mubarok",
        "email" => "ziyaadanil@gmail.com",
        "active" => 'about'
    ]);
});



Route::get('/blog', [PostController::class, 'index']);

// halaman single blog
Route::get('/blog/{blog:slug}', [PostController::class, 'show']);
// halaman semua category
Route::get('/categories', function(){
    return view('categories',[
        'title' => 'Blog Categories',
        'categories' => Category::all(),
        "active" => 'categories'
    ]);
});

// login
Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->name('login');
// logout
Route::post('/logout', [LoginController::class, 'logout']);
// register
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'register']);

// dashboard
Route::get('/dashboard', function() {
    return view('dashboard.index');
})->middleware('auth');

// dashboard data

Route::get('/dashboard/post/checkSlug', [DashboardController::class, 'checkSlug'])->middleware('auth');

Route::resource('/dashboard/post', DashboardController::class)->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');













// halaman category single
// Route::get('/categories/{category:slug}', function(Category $category){
//     return view('blog',[
//         'title' => "Post By Category : $category->name",
//         'post' => $category->post->load(['author', 'category']),
//         "active" => 'categories'
//     ]);
// });

// halaman auhtor post

// Route::get('/authors/{author:username}', function(User $author){
//     return view('blog',[
//         "active" => 'blog',
//         'title' => "Post By Author : $author->name",
//         'post' => $author->post->load('category', 'author')
//     ]);
// });