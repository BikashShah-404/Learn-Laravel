<?php

namespace App\Models;
use Illuminate\Support\Arr;

class Job{
    public static function all() : array
    {
        return [
            ['id' => '1', 'title' => 'Software Engineer', 'salary' => 'NPR 1,20,000'],
            ['id' => '2', 'title' => 'AI Engineer', 'salary' => 'NPR 1,50,000'], 
            ['id' => '3', 'title' => 'SEO Engineer', 'salary' => 'NPR 1,00,000']];
    }

    public static function getOne(int $id) : array
    {
      $job= Arr::first(static::all(), fn($job) => $job['id'] == $id);

      if(!$job){
        abort(404);
      } 

      return $job;
    }
}