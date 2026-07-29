<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/home', function () {
    return view('home'); 
});

Route::get('/jobs', function ()  {
    // We will implement eager loadin, that is load all jobs along with the employers data in the same query

    $jobs=Job::with('employer')->get(); //get() is like select *, so if million data is their, all will load , we need to apply some limiting and pagination and all
    
    // Well on doing this , we got all job along with employer details from the single query , this is eager loading. If we want we can disable lazy loading entirely from our project if we think that doesn't serve any puropse in our app context, or we could use lazy loading carefully since it does provides benefit too.

    return view('jobs', ['jobs' =>$jobs]);
});

Route::get('/jobs/{id}', function ($id) {
    $job=Job::find($id);
    return view('job',["job"=>$job]); 
});

Route::get('/about', function () {
    return view('about'); 
});

Route::get('/contact', function () {
    return view('contact');
});
