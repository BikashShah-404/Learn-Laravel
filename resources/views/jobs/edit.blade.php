<x-layout>
    <x-slot:heading>Edit Job : {{ $job->title }}</x-slot:heading>

    {{-- The browsers only natively supports GET and POST , that is why we can write in method only GET and POST but we want our framework to understand that it is PATCH so we do --}}
    <form class="max-w-xl mx-auto mt-8 space-y-6" method="POST" action="/jobs/{{ $job->id }}">
        @csrf
        {{-- Signaling laravel that we made a POST request because we hade to but i want u treat and route this request as if it were PATCH request and also this directive will expand into a hidden input label which will be sent to the server and laravel on reading that input will inderstand that its need to treat the request as PATCH not POST --}}
        @method('PATCH')
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" id="title" placeholder="Software Engineer"
                class="mt-1 block w-full rounded-xl border border-gray-300 px-4 py-2 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                required value={{ $job->title }} />
            @error('title')
                <p class="text-sm text-red-700">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="salary" class="block text-sm font-medium text-gray-700">Salary</label>
            <input type="text" name="salary" id="salary" placeholder="$50,000 /yr"
                class="mt-1 block w-full rounded-xl border border-gray-300 px-4 py-2 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                required value={{ $job->salary }}>
            @error('salary')
                <p class="text-sm text-red-700">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex justify-between">
            <button class="rounded-xl bg-red-600 px-6 py-2 text-white " form="delete-form">
                Delete
            </button>
            <div class="flex justify-end gap-4">
                <a href="/jobs/{{ $job->id }}" class="rounded-xl bg-black px-6 py-2 text-white ">
                    Cancel
                </a>
                <button type="submit" class="rounded-xl bg-blue-900 px-6 py-2 text-white hover:bg-blue-800">
                    Update
                </button>
            </div>
        </div>
    </form>
    {{-- Adding form for Delete because we require form to send request to server and two forms cannot be nested  --}}
    {{-- We link the button to the form using the form attribute in the button which is set to the id of the form that we want to target --}}
    {{-- by default the form attribute is set to the nearest parent form --}}
    <form action="/jobs/{{ $job->id }}" method="POST" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')
    </form>
</x-layout>
