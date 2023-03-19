<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ChildParentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
 
Route::group(['prefix'=>'doctor'], function($router){
   Route::post('/login' ,[DoctorController::class,'login']);
   Route::post('/register' ,[DoctorController::class,'register']);
});
Route::group(['middleware'=>'jwt.role:doctor','jwt.auth' ,'prefix'=>'doctor'], function($router){
    Route::post('/logout' ,[DoctorController::class,'logout']);
    Route::get('/user-profile' ,[DoctorController::class,'userProfile']);
 });
 Route::group(['prefix'=>'ChildParent'], function($router){
    Route::post('/login' ,[ChildParentController::class,'login']);
    Route::post('/register' ,[ChildParentController::class,'register']);
 });
 Route::group(['middleware'=>'jwt.role:ChildParent','jwt.auth' ,'prefix'=>'ChildParent'], function($router){
    Route::post('/logout' ,[ChildParentController::class,'logout']);
    Route::get('/user-profile' ,[ChildParentController::class,'userProfile']);

    Route::get('/posts', [PostController::class, 'index']); // all posts
    Route::post('/posts', [PostController::class, 'store']); // create post
    Route::get('/posts/{id}', [PostController::class, 'show']); // get single post
    Route::put('/posts/{id}', [PostController::class, 'update']); // update post
    Route::delete('/posts/{id}', [PostController::class, 'destroy']); // delete post
 
    // Comment
    Route::get('/posts/{id}/comments', [CommentController::class, 'index']); // all comments of a post
    Route::post('/posts/{id}/comments', [CommentController::class, 'store']); // create comment on a post
    Route::put('/comments/{id}', [CommentController::class, 'update']); // update a comment
    Route::delete('/comments/{id}', [CommentController::class, 'destroy']); // delete a comment
 
    // Like
    Route::post('/posts/{id}/likes', [LikeController::class, 'likeOrUnlike']); // like or dislike back a post
    
 });





 //Route::group(['middleware'=>'jwt.role:ChildParent','jwt.auth' ,'prefix'=>'ChildParent'], function($router){
   

//});
   