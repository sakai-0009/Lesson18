<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostsController;

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

Auth::routes();


//認証機能
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//ログインページ
Route::get('/', function () {
    return view('auth/login');
});


//一覧ページ
Route::get('/index', [PostsController::class, 'index']);


//投稿ページ
Route::get('/create-form', [PostsController::class, 'createForm']);


//投稿処理
Route::post('/post/create', [PostsController::class, 'create']);


//更新ページ
Route::get('post/{id}/update-form', [PostsController::class, 'updateForm']);


//更新処理
Route::post('post/update', [PostsController::class, 'update']);


//削除処理
Route::get('post/{id}/delete', [PostsController::class, 'delete']);


//検索処理
Route::post('/search', [PostsController::class, 'search']);
