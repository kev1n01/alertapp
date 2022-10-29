<?php

use App\Http\Controllers\CommentaryController;
use App\Http\Controllers\PostController;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(PostController::class)->prefix('post')->group(function(){
    Route::get('/publicaciones', 'index')->name('post.index');
    Route::post('/storepost', 'store')->name('post.store');
    Route::post('/update/{id}', 'update')->name('post.update');
    Route::get('/delete/{id}', 'delete')->name('post.delete');
    Route::get('/crear-publicacion', 'create')->name('post.create');
    Route::get('/editar-publicacion/{id}', 'edit')->name('post.edit');
    Route::get('/ver-publicacion/{titulo}','show')->name('post.show');
    Route::get('/mis-publicaciones', 'myposts')->name('post.my-posts');
    Route::get('/admin-publicaciones', 'adminpost')->name('post.admin.index');
});

Route::post('/storecommentary',[CommentaryController::class,'store'])->name('commentary.store');

Route::controller(Category::class)->prefix('category')->group(function(){
    Route::get('/categories','index')->name('category.index');
    Route::get('/store','store')->name('category.index');
});
