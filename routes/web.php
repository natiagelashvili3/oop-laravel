<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostsController as AdminPostsController;
use App\Http\Controllers\Admin\AboutController as AdminAboutController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\CategoriesController as AdminCategoriesController;
use App\Http\Controllers\Admin\TagsController as AdminTagsController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\PostsController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/test-mail', [ContactController::class, 'test'])->name('mail.test');

Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

Route::get('/posts', [PostsController::class, 'index'])->name('post.index');
Route::get('/posts/{slug}/{id}', [PostsController::class, 'view'])->name('post.view');
Route::post('/posts/comment', [PostsController::class, 'comment'])->name('post.comment');

Auth::routes();

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.home');
    Route::get('/contact', [AdminContactController::class, 'index'])->name('admin.contact');

    Route::get('/about', [AdminAboutController::class, 'index'])->name('admin.about');
    Route::post('/about', [AdminAboutController::class, 'update'])->name('admin.about.update');

    Route::get('/posts', [AdminPostsController::class, 'index'])->name('admin.posts');
    Route::get('/post/create', [AdminPostsController::class, 'create'])->name('admin.posts.create');
    Route::post('/post/store', [AdminPostsController::class, 'store'])->name('admin.posts.store');
    Route::get('/post/edit/{id}', [AdminPostsController::class, 'edit'])->name('admin.posts.edit');
    Route::post('/post/update', [AdminPostsController::class, 'update'])->name('admin.posts.update');
    Route::get('/post/delete/{id}', [AdminPostsController::class, 'destroy'])->name('admin.posts.destroy');

    Route::get('/categories', [AdminCategoriesController::class, 'index'])->name('admin.categories');
    Route::get('/category/create', [AdminCategoriesController::class, 'create'])->name('admin.categories.create');
    Route::post('/category/store', [AdminCategoriesController::class, 'store'])->name('admin.categories.store');

    Route::get('/tags', [AdminTagsController::class, 'index'])->name('admin.tags');
    Route::get('/tag/create', [AdminTagsController::class, 'create'])->name('admin.tags.create');
    Route::post('/tag/store', [AdminTagsController::class, 'store'])->name('admin.tags.store');


});



