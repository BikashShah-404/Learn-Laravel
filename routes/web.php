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
Route::get('/jobs/{id}', function ($id) {
    $job=Job::find($id);
    return view('jobs.show',["job"=>$job]); 
});

Route::get('/jobs/{id}/edit', function ($id) {
    $job=Job::find($id);
    return view('jobs.edit',["job"=>$job]); 
});

Route::patch('/jobs/{job}', function (  $id )//Job $job in param for route model binding
 {
   

    // validate
    request()->validate(['title'=>['required','min:3'],'salary'=>['required']]);

    // authorize(on Hold)

    
    // update and persist

    // We can use concept of route model binding like this :
    // Route Model Binding: Laravel sees {job} + Job $job, so it auto-runs
   // Job::findOrFail($id) and injects the $job instance. No manual lookup needed.
   // If not found, it throws 404 automatically.
   // Contrast with manual: {id} + Job::find($id) — you write the lookup,
   // it returns null on miss (no 404), and the variable name doesn't enforce
   // any convention beyond your own naming.
    // $job->update(['title'=>request('title'),'salary'=>request('salary')]);

    $job=Job::findOrFail($id); //What is we try to update a job which doesn't exist, that would crash our app, so we use findOrFail()

    // One Way:
    // $job->title=request('title');
    // $job->salary=request('salary');
    // $job->save();

    // Another Way:
    $job->update(['title'=>request('title'),'salary'=>request('salary')]);

    
    // redirect to the job page
    return redirect('/jobs/' . $job->id);  // . is string concatenation operator.
});

Route::delete('/jobs/{id}', function ($id) {
    Job::findOrFail($id)->delete();
    return redirect("/jobs");
});


Route::get('/about', function () {
    return view('about'); 
});

Route::get('/contact', function () {
    return view('contact');
});
