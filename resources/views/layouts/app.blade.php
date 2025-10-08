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
    <div class="max-w-5xl mx-auto px-4 sm:px-6 py-3">
      <div class="flex items-center gap-4">
        <a href="{{ route('home') }}" class="flex items-center gap-2 font-semibold text-zinc-900">
          <x-app-logo-icon class="h-6 w-6" />
          <span>Sotasty</span>
        </a>

        <ul class="hidden lg:flex items-center gap-2 sm:gap-4">
          <li>
            <a href="{{ route('home') }}"
               class="px-2 py-1.5 rounded-md text-sm font-medium transition
               {{ request()->routeIs('home') ? 'bg-zinc-100 text-zinc-900' : 'text-zinc-600 hover:text-zinc-900 hover:bg-zinc-50' }}">
              Home
            </a>
          </li>
          <li>
            <a href="{{ route('recipes.index') }}"
               class="px-2 py-1.5 rounded-md text-sm font-medium transition
               {{ request()->routeIs('recipes.*') ? 'bg-zinc-100 text-zinc-900' : 'text-zinc-600 hover:text-zinc-900 hover:bg-zinc-50' }}">
              Recipes
            </a>
          </li>
          <li>
            <a href="{{ route('categories.index') }}"
               class="px-2 py-1.5 rounded-md text-sm font-medium transition
               {{ request()->routeIs('categories.*') ? 'bg-zinc-100 text-zinc-900' : 'text-zinc-600 hover:text-zinc-900 hover:bg-zinc-50' }}">
              Categories
            </a>
          </li>
        </ul>

        <div class="ml-auto hidden lg:flex items-center gap-2">
          @auth
            <a href="{{ route('dashboard') }}"
               class="px-2 py-1.5 rounded-md text-sm font-medium transition text-zinc-600 hover:text-zinc-900 hover:bg-zinc-50">
              Dashboard
            </a>

            <details class="relative">
              <summary class="list-none cursor-pointer flex items-center gap-2 px-2 py-1.5 rounded-md text-sm font-medium text-zinc-700 hover:bg-zinc-50">
                <span class="inline-flex h-7 w-7 items-center justify-center rounded-md bg-zinc-200 text-zinc-900 text-xs font-semibold">
                  {{ auth()->user()->initials() }}
                </span>
                <svg class="h-4 w-4 text-zinc-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd"/></svg>
              </summary>
              <div class="absolute right-0 mt-2 w-48 rounded-md border border-zinc-200 bg-white shadow-md z-10">
                <a href="{{ route('settings.profile') }}" class="block px-3 py-2 text-sm text-zinc-700 hover:bg-zinc-50">Settings</a>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit" class="w-full text-left px-3 py-2 text-sm text-zinc-700 hover:bg-zinc-50">Log Out</button>
                </form>
              </div>
            </details>
          @else
            <a href="{{ route('login') }}" class="px-3 py-1.5 rounded-md text-sm font-medium text-zinc-700 hover:bg-zinc-50">Login</a>
            <a href="{{ route('register') }}" class="px-3 py-1.5 rounded-md text-sm font-medium text-white bg-zinc-900 hover:bg-zinc-800">Register</a>
          @endauth
        </div>

        <details class="lg:hidden ml-auto">
          <summary class="list-none cursor-pointer inline-flex items-center gap-2 rounded-md px-2 py-1.5 text-sm font-medium text-zinc-700 hover:bg-zinc-50">
            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
            Menu
          </summary>
          <div class="mt-2 rounded-md border border-zinc-200 bg-white p-2 space-y-1">
            <a href="{{ route('home') }}" class="block px-2 py-1.5 rounded text-sm {{ request()->routeIs('home') ? 'bg-zinc-100 text-zinc-900' : 'text-zinc-700 hover:bg-zinc-50' }}">Home</a>
            <a href="{{ route('recipes.index') }}" class="block px-2 py-1.5 rounded text-sm {{ request()->routeIs('recipes.*') ? 'bg-zinc-100 text-zinc-900' : 'text-zinc-700 hover:bg-zinc-50' }}">Recipes</a>
            <a href="{{ route('categories.index') }}" class="block px-2 py-1.5 rounded text-sm {{ request()->routeIs('categories.*') ? 'bg-zinc-100 text-zinc-900' : 'text-zinc-700 hover:bg-zinc-50' }}">Categories</a>
            <div class="my-1 border-t border-zinc-200"></div>
            @auth
              <a href="{{ route('dashboard') }}" class="block px-2 py-1.5 rounded text-sm text-zinc-700 hover:bg-zinc-50">Dashboard</a>
              <a href="{{ route('settings.profile') }}" class="block px-2 py-1.5 rounded text-sm text-zinc-700 hover:bg-zinc-50">Settings</a>
              <form method="POST" action="{{ route('logout') }}" class="px-2 py-1.5">
                @csrf
                <button type="submit" class="w-full text-left rounded px-2 py-1.5 text-sm text-zinc-700 hover:bg-zinc-50">Log Out</button>
              </form>
            @else
              <a href="{{ route('login') }}" class="block px-2 py-1.5 rounded text-sm text-zinc-700 hover:bg-zinc-50">Login</a>
              <a href="{{ route('register') }}" class="block px-2 py-1.5 rounded text-sm text-white bg-zinc-900 hover:bg-zinc-800">Register</a>
            @endauth
          </div>
        </details>
      </div>
    </div>
  </nav>

  <main class="max-w-5xl mx-auto px-4 sm:px-6 py-8">
    @yield('content')
  </main>

  <footer class="mt-16 bg-zinc-900 py-8 text-center text-sm text-zinc-100">
    <p class="italic">“One cannot think well, love well, sleep well, if one has not dined well.”</p>
    <p class="mt-1">© {{ date('Y') }} Sotasty</p>
  </footer>
</body>
</html>

