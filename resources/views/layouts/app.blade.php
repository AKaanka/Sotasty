<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sotasty - @yield('title','Welcome')</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-50 text-gray-900">
  <nav class="border-b bg-white">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 py-3 flex items-center gap-6">
      <a href="{{ route('home') }}" class="font-semibold">Sotasty</a>
      <a href="{{ route('recipes.index') }}">Recipes</a>
      <a href="{{ route('categories.index') }}">Categories</a>
      <div class="ml-auto"><a href="{{ route('login') }}">Login</a> · <a href="{{ route('register') }}">Register</a></div>
    </div>
  </nav>
  <main class="max-w-5xl mx-auto px-4 sm:px-6 py-8">
    @yield('content')
  </main>
</body>
</html>
