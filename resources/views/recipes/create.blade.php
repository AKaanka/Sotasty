<x-layouts.app>
    <h1 class="text-2xl font-semibold mb-4">New Recipe</h1>

    <form method="POST" action="{{ route('recipes.store') }}" class="space-y-3">
        @csrf
        <input name="title" value="{{ old('title') }}" 
               class="w-full p-2 rounded border" placeholder="Title">
        @error('title')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror

        <select name="cat_id" class="w-full p-2 rounded border">
            <option value="">Select category…</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" @selected(old('cat_id') == $cat->id)>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>
        @error('cat_id')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror

        <textarea name="description" rows="6" class="w-full p-2 rounded border" placeholder="Description">{{ old('description') }}</textarea>
        @error('description')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror

        <button class="px-4 py-2 rounded bg-blue-600 text-white">Create</button>
    </form>
</x-layouts.app>

