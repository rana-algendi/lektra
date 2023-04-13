<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ChildParentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\HospitalController;

use App\Http\Controllers\AppointmentController;

use App\Models\ChildParent;

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
   // Route::get('/appointment', [AppointmentController::class, 'index']) 
});



 
Route::group(['prefix'=>'doctor'], function($router){
   Route::post('/login' ,[DoctorController::class,'login']);
   Route::post('/register' ,[DoctorController::class,'register']);
});

Route::group(['middleware'=>'jwt.role:doctor','jwt.auth' ,'prefix'=>'doctor'], function($router){
    Route::post('/logout' ,[DoctorController::class,'logout']);
    Route::get('/user-profile' ,[DoctorController::class,'userProfile']);
    Route::post('/update', [DoctorController::class, 'update']); 

    Route::get('/posts', [PostController::class, 'index_1']); // all posts
    Route::post('/posts', [PostController::class, 'store_1']); // create post
    Route::get('/posts/{doctor_id}', [PostController::class, 'show_1']); // get single post
    Route::put('/posts/{doctor_id}', [PostController::class, 'update_1']); // update post
    Route::delete('/posts/{doctor_id}', [PostController::class, 'destroy_1']); // delete post
    
    
    // Comment
     Route::get('/posts/{doctor_id}/comments', [CommentController::class, 'index_1']); // all comments of a post
     //Route::post('/posts/{id}/comments', [CommentController::class, 'store']); // create comment on a post
     Route::post('/AddComment', [CommentController::class, 'store_1']); // create comment on a post
     
     Route::put('/comments/{doctor_id}', [CommentController::class, 'update_1']); // update a comment
     Route::delete('/comments/{doctor_id}', [CommentController::class, 'destroy_1']); // delete a comment
  
    //reply
     Route::get('/comments/{doctor_id}/replies', [ReplyController::class, 'index+1']); // all comments of a post
     //Route::post('/comments/{id}/replies', ); // create comment on a post
     Route::post("AddReply",[ReplyController::class, 'store_1']);
     Route::put('/replies/{doctor_id}', [ReplyController::class, 'update_1']); // update a comment
     Route::delete('/replies/{doctor_id}', [ReplyController::class, 'destroy_1']); // delete a comment
     // Like
     Route::post('/posts/{doctor_id}/likes', [LikeController::class, 'likeOrUnlike_1']); // like or dislike back a post
     Route::post('AddLike', [LikeController::class, 'likeOrUnlike_1']); // like or dislike back a post
 });

////////parent/////////


 Route::group(['prefix'=>'ChildParent'], function($router){
    Route::post('/login' ,[ChildParentController::class,'login']);
    Route::post('/register' ,[ChildParentController::class,'register']);
 });

 Route::group(['middleware'=>'jwt.role:ChildParent','jwt.auth' ,'prefix'=>'ChildParent'], function($router){
    Route::post('/logout' ,[ChildParentController::class,'logout']);
    Route::get('/user-profile' ,[ChildParentController::class,'userProfile']);
    // عرض كل المستشفياتRoute::get('/hospital' ,[HospitalController::class,'hospital']);
    // اضافه مستشفياتRoute::post('/upload' ,[HospitalController::class,'upload']);
    Route::post('/update', [ChildParentController::class, 'update']); 



    Route::get('/posts', [PostController::class, 'index']); // all posts
    Route::post('/posts', [PostController::class, 'store']); // create post
    Route::get('/posts/{child_parent_id}', [PostController::class, 'show']); // get single post
    Route::put('/posts/{child_parent_id}', [PostController::class, 'update']); // update post
    Route::delete('/posts/{child_parent_id}', [PostController::class, 'destroy']); // delete post
 
    // Comment
    Route::get('/posts/{id}/comments', [CommentController::class, 'index']); // all comments of a post
    //Route::post('/posts/{id}/comments', [CommentController::class, 'store']); // create comment on a post
    Route::post('/AddComment', [CommentController::class, 'store']); // create comment on a post
    
    Route::put('/comments/{id}', [CommentController::class, 'update']); // update a comment
    Route::delete('/comments/{id}', [CommentController::class, 'destroy']); // delete a comment
 
   //reply
    Route::get('/comments/{id}/replies', [ReplyController::class, 'index']); // all comments of a post
    //Route::post('/comments/{id}/replies', ); // create comment on a post
    Route::post("AddReply",[ReplyController::class, 'store']);
    Route::put('/replies/{id}', [ReplyController::class, 'update']); // update a comment
    Route::delete('/replies/{id}', [ReplyController::class, 'destroy']); // delete a comment
    // Like
    Route::post('/posts/{id}/likes', [LikeController::class, 'likeOrUnlike']); // like or dislike back a post
    Route::post('AddLike', [LikeController::class, 'likeOrUnlike']); // like or dislike back a post
    



 });





 //Route::group(['middleware'=>'jwt.role:ChildParent','jwt.auth' ,'prefix'=>'ChildParent'], function($router){
   

//});
   