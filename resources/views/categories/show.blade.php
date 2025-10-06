<x-layouts.app>
    <h1 class="text-2xl font-semibold mb-4">{{ $category->name }}</h1>
    <div class="grid md:grid-cols-3 gap-4">
        @foreach($category->recipes as $recipe)
            <a href="{{ route('recipes.show', $recipe) }}" class="block p-4 rounded border">
                <h2 class="font-semibold">{{ $recipe->title }}</h2>
                <p class="text-sm text-gray-600">By {{ $recipe->user->name }}</p>
            </a>
        @endforeach
    </div>
</x-layouts.app>
