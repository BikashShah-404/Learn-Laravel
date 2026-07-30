<x-layout>
    <x-slot:heading>Job Listings</x-slot:heading>
    <p class="flex justify-between px-10">
        <span>Job Listings are below :</span>
        <x-button href="/jobs/create">Create Job</x-button>
    </p>

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
    {{-- The UI of pagination div already looks by default because laravel assumes that we r using tailwind , well we r too --}}
    <div class="mx-10 mt-10">{{ $jobs->links() }}</div>
</x-layout>


{{-- vendor refers to any package that we have pulled in from composer and publish means that we want to publish any relevant assets,routes,file,views to my application folder so that we can manually control and edit them , so the view for our pagination component is currently in one of those vendor packages, so we want to maually control it right and hence we run : php artisan vendor:publish --}}

{{-- And then we get the views/vendor/pagination folder which contains multiple views for pagination since laravel supports various ways for displaying the pagination component and as well as various css frameworks --}}

{{-- Now suppose if we want the css framwork to bootstrap-5 instead of default tailwind, then we need to configure our application which can be done is  Providers/AppServiceProvider.php file --}}


{{-- There is a bit of performance cost in displaying pagination in this way.Suppose we have a forum with millions of records , it can actually be complex to calculate all of the pages number and render them --}}

{{-- SO we can either render simple pagination links or we could do the cursor-based pagination --}}
