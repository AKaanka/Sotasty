<x-site-layout title="All recipes">

    <h1>All Recipes</h1>

    @if ($recipes->count() === 0)
        <p>No recipes yet.</p>
    @else
        <ul>
            @foreach ($recipes as $recipe)
	            <li class="article">
	                <h2><a href="{{ url('/recipes/'.$recipe->id) }}" class="hover:underline">{{ $recipe->title }}</a></h2>
	                <p class="meta">
	                  By {{ $recipe->author?->name ?? 'Unknown author' }},
	                      {{ $recipe->created_at }}
	                  </p>
	              </li>
            @endforeach
        </ul>
    @endif

</x-site-layout>