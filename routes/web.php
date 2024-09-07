<?php

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    $posts = [];
    // $posts = auth()->user()->userCoolPosts()->latest()->get();
    // $posts = Post::all();
    // $posts = Post::where('user_id', Auth::id())->get();
    if (auth()->check()) {
        $posts = Post::where('user_id', auth()->id())->get();
    }
    return view('home', ['posts' => $posts]);
});
// accont  routes   
Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

//post routes
Route::post('/create-post', [PostController::class, 'createPost']);
Route::get('/edit-post/{post}', [PostController::class, 'editPost']);
Route::put('/edit-post/{post}', [PostController::class, 'updatedPost']);
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);
