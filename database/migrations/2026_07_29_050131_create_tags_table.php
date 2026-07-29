<?php

use App\Models\Job;
use App\Models\Tag;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('jobs_tags', function (Blueprint $table) {
            $table->id();
            // Since we had used named Job Model, which expects the table jobs , but the table jobs is provide by default by laravel, so we had made it use job_listings table as protected $table='job_listings';, now also here since we want the job_id in jobs_tags table to point to job_listings table,not jobs table given by laravel , we can overiride the column name as:
            $table->foreignIdFor(Job::class,'job_listing_id')->constrained()->cascadeOnDelete(); //by default it would have created job_id column since the class name is job, here we overrode it to job_listing_id for more clear understanding.

            // A scenarion suppose we have a tuple in jobs_tags table where job_listing_id is 1 and tag_id is 10 , but we deleted the tag_id 10 tuple, but we still have a orphan tuple pointing to the tag which doesn't exists anymore, so this is where the constraints come into picture.
            $table->foreignIdFor(Tag::class)->constrained()->cascadeOnDelete();

            // constrained() tells it to create a constain and cascadeOnDelete() means to delete the record referencing the tuple, when the referenced tuple is deleted, so on deleting either the job tuple or the tag tuple from job_listing and tags table respectively, the tuple in jobs_tags is also deleted.

            // Well even after doing all this we were able to delete the tag tuple but the corresponding referencing jobs_tags tuple wasn;t not deleted , because in SQLite, the default config says that the constraints are not enforced , but in our laravel app they r enforced, but previously we did delted and all from directly db,so we were bounded by the defaults of sqlite rather than the defaults of laravel.Which means in db of ours we need to manually enforce the constraints ,but in our laravel app they r enforced by default.

            // so to enforce the foreign constraints, we ran PRAGMA foreign_keys=on; in our db SQL.Also this is per session, so we need to make this on everytime we want to enable our foreign constraints.
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags');
        Schema::dropIfExists('jobs_tags');
    }
};
