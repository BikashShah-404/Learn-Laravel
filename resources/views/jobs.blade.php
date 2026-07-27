<x-layout>
    <x-slot:heading>Job Listings</x-slot:heading>
    <p>Job Listings are below : </p>
    <ul>
        @foreach ($jobs as $job)
            <li class="flex gap-3">
                <a href="/jobs/{{ $job['id'] }}">
                    <p class="text-blue-400 underline cursor-pointer">
                        <span class="font-semibold text-lg">{{ $job['title'] }}</span>
                        for the salary of
                        {{ $job['salary'] }}/yr.
                    </p>
                </a>
            </li>
        @endforeach
    </ul>
</x-layout>
