<x-layout>
    <x-slot:heading>Job {{ $job->title }}</x-slot:heading>
    <div>
        <h1>The job title is {{ $job->title }} and it pays anually an amount of {{ $job->salary }} </h1>
        <div class="mt-8">
            <x-button href="/jobs/{{ $job->id }}/edit">Edit Job</x-button>
        </div>
    </div>
</x-layout>

{{-- Eloquent doesn't care whether u access as content as property or an array element --}}
