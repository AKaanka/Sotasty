<x-layouts.app>
    <x-slot name="title">Recipes</x-slot>

    <section class="mx-auto max-w-6xl px-4 pb-16 sm:px-6 lg:px-8">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-semibold">All recipes</h1>
                <p class="mt-1 text-sm text-gray-500">Browse everything our cooks shared.</p>
            </div>

            @auth
                <a href="{{ route('recipes.create') }}" class="inline-block px-4 py-2 rounded bg-blue-600 text-white">
                    New Recipe
                </a>
            @endauth
        </div>

        @if(session('success'))
            {{-- Flash success message --}}
            <x-message-block type="success">{{ session('success') }}</x-message-block>
        @endif

        @if($recipes->count())
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2">
                @foreach($recipes as $recipe)
                    <x-recipes.card :recipe="$recipe" variant="compact" />
                @endforeach
            </div>
        @else
            <p class="text-gray-500">No recipes yet.</p>
        @endif

        <div class="mt-8">
            {{ $recipes->links() }}
        </div>
    </section>
</x-layouts.app>

