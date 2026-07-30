<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;


Route::view("/home",'home');

// This resource registers all 7 conventional routes, what if only need handful of those
// Route::resource("jobs",JobController::class,['only'=>['index','create','show']]);
// Route::resource("jobs",JobController::class,['except'=>['edit']]);

Route::resource("jobs",JobController::class);




Route::view("/about",'about');
Route::view("/contact",'contact');

