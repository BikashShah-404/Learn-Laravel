<?php

namespace App\Models;

class Job{
    public static function all() : array
    {
        return [
            ['id' => '1', 'title' => 'Software Engineer', 'salary' => 'NPR 1,20,000'],
            ['id' => '2', 'title' => 'AI Engineer', 'salary' => 'NPR 1,50,000'], 
            ['id' => '3', 'title' => 'SEO Engineer', 'salary' => 'NPR 1,00,000']];
    }
}