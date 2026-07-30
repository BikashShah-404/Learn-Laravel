<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;


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


// Listing our routes :
// php artisan route:list - list our app routes but also routes related to third party packages.
// To get our app routes only:
// php artisan route:list --except-vendor 