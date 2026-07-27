<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

$jobs=[['id' => '1', 'title' => 'Software Engineer', 'salary' => 'NPR 1,20,000'], ['id' => '2', 'title' => 'AI Engineer', 'salary' => 'NPR 1,50,000'], ['id' => '3', 'title' => 'SEO Engineer', 'salary' => 'NPR 1,00,000']];


Route::get('/home', function () {
    return view('home');
});

Route::get('/jobs', function () use ($jobs) {
    return view('jobs', ['jobs' =>$jobs]);
});

Route::get('/jobs/{id}', function ($id) use ($jobs) {
    $job=Arr::first($jobs, fn($job) => $job['id'] == $id);
    return view('job',['job'=>$job]);
});

Route::get('/about', function () {
    return view('about'); 
});

Route::get('/contact', function () {
    return view('contact');
});
