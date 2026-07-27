<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My App</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <nav class="w-full bg-blue-400 p-4 flex gap-4 text-lg">
        <x-nav-link href="/home" :active="request()->is('home')" type="link">Home</x-nav-link>
        <x-nav-link href="/about" :active="request()->is('about')" type="link" >About</x-nav-link>
        <x-nav-link :active="request()->is('contact')" type="button" >Contact</x-nav-link>
    </nav>
    <div class="bg-green-200 h-40 flex items-center justify-center">
        <h1 class="text-4xl ">{{$heading}}</h1>
    </div>
    <div class="pt-6 ml-4">
        {{$slot}}
    </div>
</body> 
</html>