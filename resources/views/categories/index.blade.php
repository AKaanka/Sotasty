<x-layouts.app>
    <h1 class="text-2xl font-semibold mb-4">Categories</h1>
    <ul class="list-disc pl-6">
        @foreach($categories as $cat)
            <li>
                <a class="underline" href="{{ route('categories.show', $cat) }}">
                    {{ $cat->name }} ({{ $cat->recipes_count }})
                </a>
            </li>
        @endforeach
    </ul>
</x-layouts.app>
