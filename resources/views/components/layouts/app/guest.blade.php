<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:header>
            <flux:spacer />

            <div class="flex items-center gap-3">
                <a href="{{ route('recipes.index') }}" class="text-sm" wire:navigate>{{ __('Recipes') }}</a>
                <a href="{{ route('login') }}" class="text-sm" wire:navigate>{{ __('Log in') }}</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="text-sm" wire:navigate>{{ __('Register') }}</a>
                @endif
            </div>
        </flux:header>

        <main class="container mx-auto p-6 lg:p-10">
            {{ $slot }}
        </main>

        @fluxScripts
    </body>
</html>


