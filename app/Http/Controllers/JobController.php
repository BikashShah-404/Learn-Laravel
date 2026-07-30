<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

// We make controller to modulate our app logics in different files for better understanding , since right now we only have few routes , and writing logics inside routes is already making understnading routes difficult, and hence controller comes into picture.
// php artisan make:controller and then select Empty for now to make the controller.
class JobController extends Controller
{
    public function index(){
        $jobs=Job::with('employer')->latest()->simplePaginate(2); 
        return view('jobs.index', ['jobs' =>$jobs]);
    }

    public function create(){
        return view('jobs.create');
    }
    
    public function show(Job $job){
        return view('jobs.show',["job"=>$job]); 
    }

    public function store(){
        request()->validate(['title'=>['required','min:3'],'salary'=>['required']]);
        Job::create(['title'=>request('title'),'salary'=>request('salary'),'employer_id'=>1]);
        return redirect('/jobs');
    }

    public function edit(Job $job){
        return view('jobs.edit',["job"=>$job]); 
    }
    
    public function update(Job $job){
        request()->validate(['title'=>['required','min:3'],'salary'=>['required']]);
        $job->update(['title'=>request('title'),'salary'=>request('salary')]);
        return redirect('/jobs/' . $job->id);  
    }

    public function destroy(Job $job){
        $job->delete();
        return redirect("/jobs");
    }
}
