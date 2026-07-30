<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Job extends Model{

  use HasFactory;

  protected $table='job_listings';

  // protected $fillable=['title','salary','employer_id'];
  protected $guarded=[]; //Disabling Fillable Property here , but sure enough we need to validate the form requests 
  

  // We say Job Belongs to Employer, so belongsTo, also in reverse we can say an Employer has many Jobs, so in employer Model ,we could use $this->hasMany(Job::class), similary we have many such relations definitions Eloquent has provide us with.
  public function employer(){
    return $this->belongsTo(Employer::class);
  }

  public function tags(){
    return $this->belongsToMany(Tag::class, 'jobs_tags', 'job_listing_id');
  }
}

// hasMany() means one-to-many
// belongsToMany() means many-to-many

// by default the laravel was taking job_tag table name, so had to explicitly pass table name as jobs_tags;
// And for the same reason, we passed job_listing_id