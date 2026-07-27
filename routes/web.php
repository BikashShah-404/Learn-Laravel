<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;


class Job{
    public static function all() : array
    {
        return [['id' => '1', 'title' => 'Software Engineer', 'salary' => 'NPR 1,20,000'], ['id' => '2', 'title' => 'AI Engineer', 'salary' => 'NPR 1,50,000'], ['id' => '3', 'title' => 'SEO Engineer', 'salary' => 'NPR 1,00,000']];
    }

    public static function getOne(){
        $jobs=Job::all();
    }
}

Route::get('/home', function () {
    return view('home');
});

Route::get('/jobs', function ()  {
    return view('jobs', ['jobs' =>Job::all()]);
});

Route::get('/jobs/{id}', function ($id) {
    $job=Arr::first(Job::all(), fn($job) => $job['id'] == $id);
    return view('job',['job'=>$job]);
});

Route::get('/about', function () {
    return view('about'); 
});

Route::get('/contact', function () {
    return view('contact');
});
