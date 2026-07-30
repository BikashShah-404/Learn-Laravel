<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

// Often we get into the situations where we listen for a get request and do nothing expect returning a view , for such situations we can use Route::view
// Route::get('/home', function () {
//     return view('home'); 
// });

Route::view("/home",'home');

Route::get('/jobs', [JobController::class,"index"]);
Route::get('/jobs/create',[JobController::class,"create"]);
Route::get('/jobs/{job:id}',[JobController::class,"show"] );
Route::post('/jobs', [JobController::class,"store"]);
Route::get('/jobs/{job}/edit', [JobController::class,"edit"]);
Route::patch('/jobs/{job}',[JobController::class,"update"] );
Route::delete('/jobs/{job}', [JobController::class,"destroy"] );

Route::view("/about",'about');
Route::view("/contact",'contact');





