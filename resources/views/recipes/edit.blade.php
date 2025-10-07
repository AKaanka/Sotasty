

<x-layouts.app>
    <x-slot name="title">Edit: {{ $recipe->title }}</x-slot>

    @if(session('success'))
        <div class="mb-4 rounded border p-3 bg-green-50 text-green-800">
            {{ session('success') }}
        </div>
    @endif

    <h1 class="text-2xl font-semibold mb-4">Edit Recipe</h1>

    <form method="POST" action="{{ route('recipes.update', $recipe) }}" class="space-y-3 max-w-2xl">
        @csrf
        @method('PUT')

        <label class="block">
            <span class="text-sm font-medium">Title</span>
            <input name="title"
                   value="{{ old('title', $recipe->title) }}"
                   class="w-full p-2 rounded border" required>
        </label>
        @error('title') <p class="text-sm text-red-600">{{ $message }}</p> @enderror

        <label class="block">
            <span class="text-sm font-medium">Category</span>
            <select name="cat_id" class="w-full p-2 rounded border" required>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}"
                        @selected(old('cat_id', $recipe->cat_id) == $cat->id)>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </label>
        @error('cat_id') <p class="text-sm text-red-600">{{ $message }}</p> @enderror

        <label class="block">
            <span class="text-sm font-medium">Description</span>
            <textarea name="description" rows="6"
                      class="w-full p-2 rounded border" required>{{ old('description', $recipe->description) }}</textarea>
        </label>
        @error('description') <p class="text-sm text-red-600">{{ $message }}</p> @enderror

        <div class="flex gap-2">
            <button class="px-4 py-2 rounded bg-blue-600 text-white">Save changes</button>
            <a href="{{ route('recipes.show', $recipe) }}" class="px-4 py-2 rounded border">Cancel</a>
        </div>
    </form>
</x-layouts.app>

