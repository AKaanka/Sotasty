<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:header>
            <flux:spacer />
<div class="flex items-center gap-3">
    <a href="{{ route('home') }}" class="text-sm" wire:navigate>Home</a>
    <a href="{{ route('recipes.index') }}" class="text-sm" wire:navigate>Recipes</a>
    <a href="{{ route('categories.index') }}" class="text-sm" wire:navigate>Categories</a>

    @auth
        <!-- Show Logout for logged-in users -->
        <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button type="submit" class="text-sm cursor-pointer underline">Log out</button>
        </form>
    @else
        <!-- Show Login/Register for guests -->
        <a href="{{ route('login') }}" class="text-sm" wire:navigate>Log in</a>
        @if (Route::has('register'))
            <a href="{{ route('register') }}" class="text-sm" wire:navigate>Register</a>
        @endif
    @endauth
</div>
        </flux:header>

        <main class="container mx-auto p-6 lg:p-10">
            {{ $slot }}
        </main>

        @fluxScripts
    </body>
</html>


