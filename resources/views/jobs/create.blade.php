<x-layout>
    <x-slot:heading>Create a Job</x-slot:heading>

    <form class="max-w-xl mx-auto mt-8 space-y-6" method="POST" action="/jobs">
        @csrf
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" id="title" placeholder="Software Engineer"
                class="mt-1 block w-full rounded-xl border border-gray-300 px-4 py-2 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                required />
            @error('title')
                <p class="text-sm text-red-700">{{ $message }}</p>
            @enderror
            {{-- THe message variable is only available inside the blade directive --}}
        </div>

        <div>
            <label for="salary" class="block text-sm font-medium text-gray-700">Salary</label>
            <input type="text" name="salary" id="salary" placeholder="$50,000 /yr"
                class="mt-1 block w-full rounded-xl border border-gray-300 px-4 py-2 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                required>
            @error('salary')
                <p class="text-sm text-red-700">{{ $message }}</p>
            @enderror
        </div>

        {{-- <div class="mt-4">
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-red-700 italic">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div> --}}

        {{-- <div>
            <label for="employer" class="block text-sm font-medium text-gray-700">Employer</label>
            <select name="employer_id" id="employer"
                class="mt-1 block w-full rounded-xl border border-gray-300 px-4 py-2 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                <option value="">Select an employer</option>
                <option value="1">Acme Corp</option>
                <option value="2">Globex Inc</option>
            </select>
        </div>

        <div>
            <label for="tags" class="block text-sm font-medium text-gray-700">Tags</label>
            <input type="text" name="tags" id="tags" placeholder="Laravel, Vue, Tailwind"
                class="mt-1 block w-full rounded-xl border border-gray-300 px-4 py-2 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            <p class="mt-1 text-xs text-gray-500">Separate tags with commas.</p>
        </div> --}}

        <div class="flex justify-end">
            <button type="submit" class="rounded-xl bg-blue-900 px-6 py-2 text-white hover:bg-blue-800">
                Save
            </button>
        </div>
    </form>
</x-layout>
