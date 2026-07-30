<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;


Route::view("/home",'home');

// Route::controller(JobController::class)->group(function(){
//     Route::get('/jobs', "index");
//     Route::get('/jobs/create',"create");
//     Route::get('/jobs/{job:id}',"show" );
//     Route::post('/jobs', "store");
//     Route::get('/jobs/{job}/edit',"edit");
//     Route::patch('/jobs/{job}',"update" );
//     Route::delete('/jobs/{job}',"destroy" );
// });

// We can use Route::resource() to have same effect as above routing and controller used for each route.
// The resource using works because we have followed the same conventions that r required by the route::resource() to map routes to controllers.
// Correct. Route::resource('jobs', JobController::class) expects:
// Route parameter: Singular form of the resource name — {job} (not {id})
// Controller methods: Specific names — index, create, store, show, edit, update, destroy
// URI pattern: Automatically generated:
// Verb	        URI	        Controller-method
// GET          /jobs	            index
// GET	        /jobs/create	    create
// POST	        /jobs	            store
// GET	        /jobs/{job}	        show
// GET	        /jobs/{job}/edit    edit
// PATCH/PUT    /jobs/{job}	        update
// DELETE	    /jobs/{job}	        destroy
Route::resource("jobs",JobController::class);


Route::view("/about",'about');
Route::view("/contact",'contact');

