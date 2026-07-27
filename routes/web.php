<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/home', function () {
    return view('home');
});

Route::get('/jobs', function ()  {
    return view('jobs', ['jobs' =>Job::all()]);
});

Route::get('/jobs/{id}', function ($id) {
    return view('job',["job"=>Job::getOne($id)]); 
});

Route::get('/about', function () {
    return view('about'); 
});

Route::get('/contact', function () {
    return view('contact');
});
