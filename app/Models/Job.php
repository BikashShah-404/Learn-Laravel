<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Job extends Model{

  use HasFactory;

  protected $table='job_listings';

  protected $fillable=['title','salary'];

  // We say Job Belongs to Employer, so belongsTo, also in reverse we can say an Employer has many Jobs, so in employer Model ,we could use $this->hasMany(Job::class), similary we have many such relations definitions Eloquent has provide us with.
  public function employer(){
    return $this->belongsTo(Employer::class);
  }
}