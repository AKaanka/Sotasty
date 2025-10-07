
<x-layouts.app>
    <x-slot name="title">{{ $recipe->title }}</x-slot>

    {{-- Flash success (e.g., after update/delete/comment) --}}
    @if(session('success'))
        <div class="mb-4 rounded border p-3 bg-green-50 text-green-800">
            {{ session('success') }}
        </div>
    @endif

   <article class="max-w-3xl mx-auto p-6 bg-white border rounded text-black">

         <h1 class="text-3xl font-bold text-black">{{ $recipe->title }}</h1>

        <p class="mt-1 text-sm text-gray-600">
            By {{ $recipe->user->name }}
            @if($recipe->category)
                &middot; {{ $recipe->category->name }}
            @endif
            &middot; <em>{{ $recipe->created_at->diffForHumans() }}</em>
        </p>

         <div class="mt-5 leading-7 whitespace-pre-line text-black">
            {{-- description is the correct field (NOT "content") --}}
            {{ $recipe->description }}
        </div>

        @auth
            @if($recipe->isOwnedBy(auth()->user()) || auth()->user()->email === 'admin@admin.com')
                <div class="mt-6 flex gap-2">
                    <a href="{{ route('recipes.edit', $recipe) }}"
                       class="px-4 py-2 rounded bg-yellow-500 text-white">Edit</a>

                    <form method="POST" action="{{ route('recipes.destroy', $recipe) }}"
                          onsubmit="return confirm('Delete this recipe?');">
                        @csrf @method('DELETE')
                        <button class="px-4 py-2 rounded bg-red-600 text-white">Delete</button>
                    </form>
                </div>
            @endif
        @endauth
    </article>

    {{-- Comments --}}
    <section class="max-w-3xl mx-auto mt-10">
        <h2 class="text-xl font-semibold mb-3">
            Comments ({{ $recipe->comments->count() }})
        </h2>

        <div class="space-y-3 mb-6">
            @forelse($recipe->comments as $comment)
                <div class="p-3 rounded border bg-white">
                    <p class="text-sm text-gray-600">
                        {{ $comment->user->name }} &middot; <em>{{ $comment->created_at->diffForHumans() }}</em>
                    </p>
                    <p class="mt-1">{{ $comment->content }}</p>
                </div>
            @empty
                <p class="text-gray-600">No comments yet.</p>
            @endforelse
        </div>

        @auth
    <form method="POST" action="{{ route('recipes.comments.store', $recipe) }}" class="space-y-2">
        @csrf
        <textarea
            name="content"
            placeholder="Add a comment..."
            class="w-full rounded-md border border-gray-300 bg-white text-black p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
            rows="3"
        >{{ old('content') }}</textarea>
        @error('content')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
        <button class="px-4 py-2 rounded bg-blue-600 text-white">Post Comment</button>
    </form>
@endauth

    </section>
</x-layouts.app>


