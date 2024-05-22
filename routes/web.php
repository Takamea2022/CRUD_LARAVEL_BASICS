<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

Route::get('/', function () { 

        // $posts = auth()->user()->usersCoolPosts()->get();
        $posts = Post::where('user_id', auth()->id())->get();
        return view('home', ['posts' => $posts]);
   
});
 


// UserController
Route::post('/register', [UserController::class, 'register']);
Route::post('/logout',[UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);


//PostController Blog Post related Routes::
Route::post('/create-post', [PostController::class, 'createPost']);
Route::get('/edit-post/{post}', [PostController::class, 'showEditScreen']);
Route::put('/edit-post/{post}', [PostController::class, 'actuallyUpdatePost']);
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);


?> 
