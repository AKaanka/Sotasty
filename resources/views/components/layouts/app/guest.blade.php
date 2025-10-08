<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:header container class="border-b border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900 py-4">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <a href="{{ route('home') }}" class="ms-2 me-5 flex items-center space-x-2 rtl:space-x-reverse lg:ms-0" wire:navigate>
                <x-app-logo />
            </a>

            <flux:navbar class="-mb-px max-lg:hidden text-lg lg:text-xl">
                <flux:navbar.item class="text-xl lg:text-2xl" :href="route('home')" :current="request()->routeIs('home')" wire:navigate>
                    {{ __('Home') }}
                </flux:navbar.item>
                <flux:navbar.item class="text-xl lg:text-2xl" :href="route('recipes.index')" :current="request()->routeIs('recipes.*')" wire:navigate>
                    {{ __('Recipes') }}
                </flux:navbar.item>
                <flux:navbar.item class="text-xl lg:text-2xl" :href="route('categories.index')" :current="request()->routeIs('categories.*')" wire:navigate>
                    {{ __('Categories') }}
                </flux:navbar.item>
            </flux:navbar>

            <flux:spacer />

            <flux:navbar class="me-1.5 space-x-0.5 rtl:space-x-reverse max-lg:hidden text-lg lg:text-xl">
                @guest
                    <flux:navbar.item :href="route('login')" wire:navigate>
                        {{ __('Log in') }}
                    </flux:navbar.item>
                    @if (Route::has('register'))
                        <flux:navbar.item :href="route('register')" wire:navigate>
                            {{ __('Register') }}
                        </flux:navbar.item>
                    @endif
                @endguest

                @auth
                    @if (Route::has('dashboard'))
                        <flux:navbar.item :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>
                            {{ __('Dashboard') }}
                        </flux:navbar.item>
                    @endif

                    <flux:dropdown position="top" align="end">
                        <flux:profile class="cursor-pointer" :initials="auth()->user()->initials()" />
                        <flux:menu>
                            <flux:menu.radio.group>
                                <div class="p-0 text-sm font-normal">
                                    <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                        <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                            <span class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                                {{ auth()->user()->initials() }}
                                            </span>
                                        </span>
                                        <div class="grid flex-1 text-start text-sm leading-tight">
                                            <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                            <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                        </div>
                                    </div>
                                </div>
                            </flux:menu.radio.group>
                            <flux:menu.separator />
                            <flux:menu.radio.group>
                                @if (Route::has('settings.profile'))
                                    <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                                @endif
                            </flux:menu.radio.group>
                            <flux:menu.separator />
                            <form method="POST" action="{{ route('logout') }}" class="w-full">
                                @csrf
                                <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                                    {{ __('Log Out') }}
                                </flux:menu.item>
                            </form>
                        </flux:menu>
                    </flux:dropdown>
                @endauth
            </flux:navbar>
        </flux:header>

        <!-- Mobile menu -->
        <flux:sidebar stashable sticky class="lg:hidden border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <a href="{{ route('home') }}" class="ms-1 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
                <x-app-logo />
            </a>

            <flux:navlist variant="outline" class="text-lg">
                <flux:navlist.group :heading="__('Navigate')">
                    <flux:navlist.item class="text-xl" :href="route('home')" :current="request()->routeIs('home')" wire:navigate>
                        {{ __('Home') }}
                    </flux:navlist.item>
                    <flux:navlist.item class="text-xl" :href="route('recipes.index')" :current="request()->routeIs('recipes.*')" wire:navigate>
                        {{ __('Recipes') }}
                    </flux:navlist.item>
                    <flux:navlist.item class="text-xl" :href="route('categories.index')" :current="request()->routeIs('categories.*')" wire:navigate>
                        {{ __('Categories') }}
                    </flux:navlist.item>
                </flux:navlist.group>
            </flux:navlist>

            <flux:spacer />

            <flux:navlist variant="outline">
                @guest
                    <flux:navlist.item :href="route('login')" wire:navigate>
                        {{ __('Log in') }}
                    </flux:navlist.item>
                    @if (Route::has('register'))
                        <flux:navlist.item :href="route('register')" wire:navigate>
                            {{ __('Register') }}
                        </flux:navlist.item>
                    @endif
                @endguest
                @auth
                    @if (Route::has('dashboard'))
                        <flux:navlist.item :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>
                            {{ __('Dashboard') }}
                        </flux:navlist.item>
                    @endif
                    @if (Route::has('settings.profile'))
                        <flux:navlist.item :href="route('settings.profile')" wire:navigate icon="cog">
                            {{ __('Settings') }}
                        </flux:navlist.item>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:navlist.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                            {{ __('Log Out') }}
                        </flux:navlist.item>
                    </form>
                @endauth
            </flux:navlist>
        </flux:sidebar>

        <main class="container mx-auto p-6 lg:p-10">
            {{ $slot }}
        </main>

        <footer class="mt-16 bg-zinc-900 py-8 text-center text-sm text-zinc-100">
            <p class="italic">“One cannot think well, love well, sleep well, if one has not dined well.”</p>
            <p class="mt-1">&copy; {{ date('Y') }} Sotasty</p>
        </footer>

        @fluxScripts
    </body>
</html>


