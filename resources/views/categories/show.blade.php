<x-layouts.app>
    <div class="mb-6 flex items-end justify-between">
        <div>
            <h1 class="text-2xl font-semibold leading-tight">{{ $category->name }}</h1>
            <p class="mt-1 text-sm text-gray-500">{{ $category->recipes->count() }} {{ Str::plural('recipe', $category->recipes->count()) }}</p>
        </div>
    </div>

    @if($category->recipes->isEmpty())
        <div class="rounded-2xl border border-dashed border-gray-300 p-10 text-center text-gray-500">
            No recipes in this category yet.
        </div>
    @else
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
            @foreach($category->recipes as $recipe)
                <x-recipes.card :recipe="$recipe" variant="compact" />
            @endforeach
        </div>
    @endif
</x-layouts.app>
