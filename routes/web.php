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


Route::get('/jobs/create',function (){
    return view('jobs.create');
});

Route::post('/jobs', function ()  {
    request()->validate(['title'=>['required','min:3'],'salary'=>['required']]);
    Job::create(['title'=>request('title'),'salary'=>request('salary'),'employer_id'=>1]);
    return redirect('/jobs');
});


// Generally the wildcard for our routes are below all of the specific routes.
// Wildcard and parameter should have same name, and then we add type to the parameter to signal the laravel i want the instance of that class instead of the string that is in the URI.SO laravel matches the string that is in the URI to the id of the jobs in the db and hence returns the job

// Now to configure what column in db should laravel match against the string that is passed in URI, we  add : and then the column name 
// {post:slug} in case of blog for exmaple, the default is {post:id}
Route::get('/jobs/{job:id}', function (Job $job) {
    return view('jobs.show',["job"=>$job]); 
});

Route::get('/jobs/{job}/edit', function (Job $job) {
    return view('jobs.edit',["job"=>$job]); 
});

Route::patch('/jobs/{job}', function ( Job $job )
 {
    request()->validate(['title'=>['required','min:3'],'salary'=>['required']]);
    $job->update(['title'=>request('title'),'salary'=>request('salary')]);
    return redirect('/jobs/' . $job->id);  
});

Route::delete('/jobs/{job}', function (Job $job) {
    $job->delete();
    return redirect("/jobs");
});


Route::get('/about', function () {
    return view('about'); 
});

Route::get('/contact', function () {
    return view('contact');
});
