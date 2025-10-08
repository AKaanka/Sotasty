<x-layouts.app>
    <div class="mb-6 flex items-end justify-between">
        <div>
            <h1 class="text-2xl font-semibold leading-tight">Categories</h1>
            <p class="mt-1 text-sm text-gray-500">Browse recipes by category</p>
        </div>
    </div>

    @if($categories->isEmpty())
        <div class="rounded-2xl border border-dashed border-gray-300 p-10 text-center text-gray-500">
            No categories yet.
        </div>
    @else
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @foreach($categories as $cat)
                <a href="{{ route('categories.show', $cat) }}"
                   class="group block rounded-2xl border border-gray-200 bg-white p-6 shadow-sm ring-1 ring-transparent transition hover:-translate-y-0.5 hover:shadow-md hover:ring-sky-100">
                    <div class="flex items-start justify-between">
                        <h2 class="text-lg font-semibold text-gray-900 group-hover:underline">
                            {{ $cat->name }}
                        </h2>
                        <span class="ms-3 inline-flex items-center rounded-md bg-sky-50 px-2 py-1 text-[11px] font-medium text-sky-700 ring-1 ring-sky-100">
                            {{ $cat->recipes_count }}
                        </span>
                    </div>
                    <p class="mt-2 text-sm text-gray-500">{{ Str::plural('recipe', $cat->recipes_count) }}</p>
                </a>
            @endforeach
        </div>
    @endif
</x-layouts.app>

