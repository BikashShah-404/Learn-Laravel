<x-layout>
    <x-slot:heading>Job Listings</x-slot:heading>
    <p>Job Listings are below : </p>
    <ul class="flex flex-col gap-4 my-4">
        @foreach ($jobs as $job)
            <li class="">
                <a href="/jobs/{{ $job['id'] }}"
                    class=" flex flex-col gap-1 text-black  cursor-pointer p-2 bg-gray-100 rounded-2xl pl-4">
                    <p class="">{{ $job->employer->name }}</p>
                    <p class="">
                        <span class="font-semibold text-lg">{{ $job['title'] }}</span>
                        for the salary of
                        {{ $job['salary'] }}/yr.
                    </p>
                </a>
            </li>
        @endforeach
    </ul>
</x-layout>

{{-- We have a bit of the problem and the problem is called the N+1 problem ,   it refers to the database queries executed within a loop, rather than making a single query that loads all of the relevant data up front --}}

{{-- We know that a new sql query is executed when we refrence a relationship which is called the lazy loading, how does the concept of lazy loading works in the context of loop, will multiple queries run for each loop iteration(each item in the loop) Well, Yes --}}

{{-- That is where the N+1 Problem comes --}}
{{-- Note : Composer is a package manager --}}

{{-- When we see multiple queries which are nearly identical other than a particular id, that's the N+1 problem --}}

{{-- So, we were running the query [select * from "employers" where "employers"."id" = 1 limit 1] for all of the data that we have in the employers table, if we had 1000 employers, 1000 of such queries would have been executed --}}

{{-- Lazy Loading can be helpful, but use it carefully cause it might cause some performnce issues like this --}}

{{-- So, how do we Fix This?? --}}
