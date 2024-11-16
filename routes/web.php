<?php

use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $posts = Post::all();
    //if (auth()->check()){
       // $posts = auth()->user()->usersCarDescription()->latest()->get();}

    //$posts = Post::where('user_id', auth()->id()-> get());
    return view('home', ['posts' => $posts]);
});

Route::POST('/user-posts', function () {
    Post::all();
    $posts = [];
    if (auth()->check()){
        $posts = auth()->user()->usersCarDescription()->latest()->get();
    }
    //$posts = Post::where('user_id', auth()->id()-> get());
    return view('/user-posts', ['posts' => $posts]);
});

Route::get('/choose-car', function () {
    $posts = Post::all();
    return view('/choose-car', ['posts' => $posts]);
});

Route::get('/form-calculate/{postId}', function (\Illuminate\Http\Request $request) {
    $postId = $request->route('postId');
    $post = Post::query()->find($postId);
    return view('form-calculate', ['post' => $post]);
});

Route::get('/calculate/{postId}', function (\Illuminate\Http\Request $request, \App\Services\PriceCalculator $calculator) {
    $postId = $request->route('postId');
    $post = Post::query()->find($postId);

    $price = $post->price;
    $numberOfDays = $request->get('numberOfDays');

//    switch ($numberOfDays) {
//        case $numberOfDays > 0 :
//            $result = $numberOfDays * $price;
//            break;
//        case $numberOfDays = 0 :
//            $result = back()->withErrors(['error' => 'Invalid operation']);
//            break;
//        default:
//            return back()->withErrors(['error' => 'Invalid operation.']);
//    }

    $result = $calculator->calc($post, $numberOfDays);

    return view('result', ['postId'=>$postId, 'result' => $result, 'numberOfDays' => $numberOfDays]);


//    return view('form-calculate', ['post' => $post]);
});

Route::post('/signup', [UserController::class, 'signup']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

//Route::get('/form-calculate{post}', [CalculatorController::class, 'showCalculateForm']);

Route::view('/about', 'about');
Route::view('/login-logout', 'login-logout');

// add car related routes

Route::post('/add-car', [PostController::class, 'addCar']);
Route::get('/edit-post/{post}', [PostController::class, 'showEditScreen']);
Route::put('/edit-post/{post}', [PostController::class, 'actuallyUpdatePost']);
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);

Route::post('/record-order/{postId}', [RecordController::class, 'createRecord']);

