<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sotasty - @yield('title','Welcome')</title>

  {{-- This pulls in Tailwind + your JS via Vite --}}
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-50 text-gray-900">
  <nav class="border-b bg-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 py-3 flex items-center gap-6">
      <a href="{{ route('home') }}" class="font-semibold">Sotasty</a>
      <a href="{{ route('home') }}" class="hover:underline">Home</a>
      <a href="{{ route('recipes.index') }}" class="hover:underline">Recipes</a>
      <a href="{{ route('categories.index') }}" class="hover:underline">Categories</a>
      <div class="ml-auto flex items-center gap-4">
        <a href="{{ route('login') }}" class="hover:underline">Login</a>
        <a href="{{ route('register') }}" class="hover:underline">Register</a>
      </div>
    </div>
  </nav>

  <main class="max-w-5xl mx-auto px-4 sm:px-6 py-8">
    @yield('content')
  </main>

  <footer class="mt-16 py-8 text-center text-sm text-gray-500">
    © {{ date('Y') }} Sotasty
  </footer>
</body>
</html>

