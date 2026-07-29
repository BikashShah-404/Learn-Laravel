<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/home', function () {
    return view('home'); 
});

Route::get('/jobs', function ()  {

    // $jobs=Job::with('employer')->simplePaginate(2); 
    // In simple paginate we only have prev and next button and that's it,and hence the name simplePaginate().

    $jobs=Job::with('employer')->cursorPaginate(2); 
    // In cursor-based pagination, it is more performant option but there is a bit of cost, see when we hover/click on next/prev the url is something like http://127.0.0.1:8000/jobs?cursor=eyJqb2JfbGlzdGluZ3MuaWQiOjIsIl9wb2ludHNUb05leHRJdGVtcyI6dHJ1ZX0 which is not idle, but for other paginations , we used to have normal urls as http://127.0.0.1:8000/jobs?page=1


    // paginate() ra simplePaginate() duitai leh limit ra offset in SQL query use garxan , but the curosrPaginate() uses the a cursor=encodedData, that encodedstrings represents the location of the next set of results that laravel should fetch from the jobs tables. 
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
