<x-layouts.app>
    <x-slot name="title">{{ $recipe->title }}</x-slot>

    <div class="flex items-center justify-between mb-4">
        <div>
            <h1 class="text-2xl font-semibold">{{ $recipe->title }}</h1>
            <p class="text-sm text-gray-600">
                By {{ $recipe->user->name }} in {{ $recipe->category?->name }}
            </p>
        </div>
        @auth
            @if($recipe->user_id === auth()->id() || auth()->user()->email === 'admin@admin.com')
                <div class="space-x-2">
                    <a href="{{ route('recipes.edit', $recipe) }}" class="px-3 py-1 rounded bg-yellow-500 text-white">Edit</a>
                    <form action="{{ route('recipes.destroy', $recipe) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button class="px-3 py-1 rounded bg-red-600 text-white" onclick="return confirm('Delete this recipe?')">Delete</button>
                    </form>
                </div>
            @endif
        @endauth
    </div>

    <p class="mb-8 whitespace-pre-line">{{ $recipe->description }}</p>

    <h2 class="text-xl font-semibold mb-2">Comments ({{ $recipe->comments->count() }})</h2>
    <div class="space-y-3 mb-6">
        @forelse($recipe->comments as $comment)
            <div class="p-3 rounded border">
                <p class="text-sm text-gray-600">{{ $comment->user->name }}</p>
                <p>{{ $comment->content }}</p>
            </div>
        @empty
            <p>No comments yet.</p>
        @endforelse
    </div>

    @auth
    <form action="{{ route('recipes.comments.store', $recipe) }}" method="POST" class="space-y-2">
        @csrf
        <textarea name="content" class="w-full p-2 rounded border" rows="3" placeholder="Add a comment...">{{ old('content') }}</textarea>
        @error('content') <p class="text-sm text-red-600">{{ $message }}</p> @enderror

        <button class="px-4 py-2 rounded bg-blue-600 text-white">Post Comment</button>
    </form>
    @else
        <p><a href="{{ route('login') }}" class="text-blue-600 underline">Log in</a> to comment.</p>
    @endauth
</x-layouts.app>
