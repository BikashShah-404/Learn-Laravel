<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;


Route::view("/home",'home');

// Here we have been repeating our controller names in our routes right, better would be to use "Route Group" as :
Route::controller(JobController::class)->group(function(){
    Route::get('/jobs', "index");
    Route::get('/jobs/create',"create");
    Route::get('/jobs/{job:id}',"show" );
    Route::post('/jobs', "store");
    Route::get('/jobs/{job}/edit',"edit");
    Route::patch('/jobs/{job}',"update" );
    Route::delete('/jobs/{job}',"destroy" );
});


Route::view("/about",'about');
Route::view("/contact",'contact');

