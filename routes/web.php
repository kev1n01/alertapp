<?php

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
Route::get('/publicaciones', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');

Route::post('/storepost', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
Route::get('/delete/{id}', [App\Http\Controllers\PostController::class, 'delete'])->name('post.delete');
Route::get('/crear-publicacion', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
Route::get('/editar-publicacion/{id}', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
Route::get('/ver-publicacion/{titulo}', [App\Http\Controllers\PostController::class, 'show'])->name('post.show');
Route::get('/mis-publicaciones', [App\Http\Controllers\PostController::class, 'myposts'])->name('post.my-posts');
Route::get('/admin-publicaciones', [App\Http\Controllers\PostController::class, 'adminpost'])->name('post.admin.index');
