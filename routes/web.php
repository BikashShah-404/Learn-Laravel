<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/home', function () {
    return view('home'); 
});

Route::get('/jobs', function ()  {
    $jobs=Job::with('employer')->latest()->simplePaginate(2); 
    return view('jobs.index', ['jobs' =>$jobs]);
});

Route::post('/jobs', function ()  {

    // Always validate , never trust the user: 
    // Client-Side Validation is also necessary , but the user can bypass client side validation by simply using terminal to send requests, or using postman, or curl,etc.
    // The most important is server side validation:

    request()->validate(['title'=>['required','min:3'],'salary'=>['required']]);


    Job::create(['title'=>request('title'),'salary'=>request('salary'),'employer_id'=>1]);
    return redirect('/jobs');
});


Route::get('/jobs/create',function (){
    return view('jobs.create');
});

// Generally the wildcard for our routes are below all of the specific routes.
Route::get('/jobs/{id}', function ($id) {
    $job=Job::find($id);
    return view('jobs.show',["job"=>$job]); 
});


Route::get('/about', function () {
    return view('about'); 
});

Route::get('/contact', function () {
    return view('contact');
});
