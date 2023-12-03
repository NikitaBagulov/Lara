<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::get('/', [Controllers\PostController::class, 'index']);

Route::get('/users/add', [Controllers\UserController::class,'add']);
Route::get('/users', [Controllers\UserController::class, 'index']);
Route::get('/users/{id}', [Controllers\UserController::class,'show']);
Route::post('/users', [Controllers\UserController::class,'store']); 
Route::get('/users/{id}/edit', [Controllers\UserController::class,'edit']); 
Route::post('/users/{id}', [Controllers\UserController::class,'update']);
Route::delete('/users/{id}/delete', [Controllers\UserController::class,'destroy']);

Route::post('/users/{user}/posts/{post}', [Controllers\PostController::class, 'update']);
Route::get('/users/{user}/posts_create', [Controllers\PostController::class, 'create']);
// Route::get('/users/{user}/posts/{post}', [Controllers\PostController::class, 'show']);
Route::post('/users/{user}/posts', [Controllers\PostController::class, 'store']);
Route::get('/users/{user}/posts/{post}/edit', [Controllers\PostController::class, 'edit']);
Route::delete('/users/{user}/posts/{post}/delete', [Controllers\PostController::class,'destroy']);
Route::post('users/{user}/posts/{post}/publish', [Controllers\PostController::class,'publish']);
Route::post('users/{user}/posts/{post}/unpublish', [Controllers\PostController::class,'unpublish']);

Route::get('/users/{user}/posts/{post}/create_com', [Controllers\CommentController::class, 'create']);
Route::post('/users/{user}/posts/{post}/create_com', [Controllers\CommentController::class, 'store']);

Route::get("/posts", [Controllers\PostController::class, 'get_json']);

Route::get('/comments', [Controllers\CommentController::class, 'index']);
Route::post('/comments/{commentId}/approve',[Controllers\CommentController::class,'approve']);
Route::post('/comments/{commentId}/reject', [Controllers\CommentController::class,'reject']);

// Route::post('/form', [Controllers\UserController::class, 'process_form']);
// Route::post('/data', [Controllers\DataController::class, 'show_data']);


