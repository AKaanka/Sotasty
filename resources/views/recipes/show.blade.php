<x-site-layout title="{{$recipe->title}}">

    <div>
        <h1>{{ $recipe->title }}</h1>
        <p class="meta">
            By {{ $recipe->author?->name ?? 'Unknown author' }},
            {{ $recipe->created_at }}
        </p>
        <div class="content">
            {{ $recipe->content }}
        </div>
    </div>
    
    <p><a href="/recipes">Back to recipes overview </a></p>

</x-site-layout>