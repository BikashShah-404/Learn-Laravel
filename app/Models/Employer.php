<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    /** @use HasFactory<\Database\Factories\EmployerFactory> */
    use HasFactory;

    /*
     The relations that we are defining here in the modesl, now in the php artisna tinker, when we write 
     $employer=App\Models\Employer::first(); 
     $employer->jobs; this essentially executs a SQL query which tells it to execute SELECT * FROM jobs WHERE employer_id = ? with the employer's ID bound as a parameter (not string interpolation). This is safer against SQL injection..The point is basically its executing the sql query behind the scence, Also there comes a concept of lazy loading so essentially ,the query is parsed but it gets executed only when we request/access the property $employer->jobs.    
    */
    public function jobs(){
        return $this->hasMany(Job::class);
    }

    /* 
    We will get a collection of Jobs in return which we can interact as an array or even as an collection.
    so $employer->jobs[0]->title 
       $employer->jobs->first() , first() is one of the methods defined on the collection  */
}
