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
    // In previous version of laravel, we would get 419 error which essentially means the Laravel's Automatic CSRF protection. and we would have to add @csrf(a hidden inout field with the value set to our session token) in order to send the token along with our request which laravel would verify with our session token and complete the request.
    // But now in newer versions, PreventRequestForgery also checks the browser's Sec-Fetch-Site header, so same-origin requests from modern browsers skip the token check.
    // However, you should still always add @csrf for compatibility — old browsers, curl/Postman, and cross-site requests still rely on the token.

    // dd(request()->all()); 
    // array:3 [▼ // routes\web.php:20
    //   "_token" => "LksUKBKzsPGneXtDcjsZclV7HMA66NqA0KrKcnH0"
    //   "title" => "Apple"
    //   "salary" => "100000"
    // ]

    // dd(request('title'))

    // We need to validate too , skip for now

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
