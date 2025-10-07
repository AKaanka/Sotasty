<x-layouts.app>
    <x-slot name="title">{{ $recipe->title }}</x-slot>

    <x-recipes.card :recipe="$recipe" variant="full" class="mx-auto max-w-3xl" />
    {{-- Comments --}}
    <h2 class="text-xl font-semibold mt-10 mb-2">
        Comments ({{ $recipe->comments->count() }})
    </h2>
    <div class="space-y-3 mb-6">
        @forelse($recipe->comments as $comment)
            <div class="p-3 rounded border bg-white shadow-sm">
                <p class="text-sm text-gray-600 font-medium">{{ $comment->user->name }}</p>
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
