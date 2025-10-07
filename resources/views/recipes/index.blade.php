<x-layouts.app>
    <x-slot name="title">Recipes</x-slot>

    <h1 class="text-2xl font-semibold mb-4">Recipes</h1>

    @if(session('success'))
        <x-message-block type="success">{{ session('success') }}</x-message-block>
    @endif

    @auth
        <a href="{{ route('recipes.create') }}" class="inline-block px-4 py-2 rounded bg-blue-600 text-white mb-4">New Recipe</a>
    @endauth

    <div class="grid md:grid-cols-3 gap-4">
        @forelse($recipes as $recipe)
            <a href="{{ route('recipes.show', $recipe) }}" class="block p-4 rounded border">
                <h2 class="font-semibold">{{ $recipe->title }}</h2>
                <p class="text-sm text-gray-600">By {{ $recipe->user->name }} · {{ $recipe->category?->name }}</p>
                <p class="mt-2 line-clamp-3">{{ $recipe->description }}</p>
            </a>
        @empty
            <p>No recipes yet.</p>
        @endforelse
    </div>

    <div class="mt-6">
        {{ $recipes->links() }}
    </div>
</x-layouts.app>
