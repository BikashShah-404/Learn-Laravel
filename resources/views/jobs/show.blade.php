<x-layout>
    <x-slot:heading>Job {{ $job['id'] }}</x-slot:heading>
    <div>
        <h1>The job title is {{ $job['title'] }} and it pays anually an amount of {{ $job['salary'] }} </h1>
    </div>
</x-layout>
