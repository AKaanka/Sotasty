@props([
  'recipe',
  'variant' => 'compact', // 'full' for show page, 'compact' for listings
])

@php
  $isFull = $variant === 'full';
  $wrapper = 'rounded-2xl border border-gray-200 bg-white shadow-sm hover:shadow-md transition text-gray-900';
  $pad = $isFull ? 'p-8' : 'p-6';
  $titleClass = $isFull ? 'text-2xl font-bold' : 'text-xl font-semibold';
  $descLimit = $isFull ? 2000 : 300; // no trimming in full mode
@endphp

<article {{ $attributes->merge(['class' => $wrapper.' '.$pad]) }}>
  {{-- Category badge --}}
  <div class="mb-3 flex items-center gap-2">
    @if(isset($recipe->category) || (method_exists($recipe,'relationLoaded') && $recipe->relationLoaded('category')))
      <span class="inline-flex items-center rounded-md bg-sky-50 px-2 py-1 text-[11px] font-medium text-sky-700 ring-1 ring-sky-100">
        {{ optional($recipe->category)->name ?? 'Uncategorized' }}
      </span>
    @endif
  </div>

  {{-- Title --}}
  <h1 class="{{ $titleClass }} leading-snug">
    @if ($isFull)
      {{ $recipe->title }}
    @else
      <a href="{{ route('recipes.show', $recipe) }}" class="decoration-2 underline-offset-2 hover:underline">
        {{ $recipe->title }}
      </a>
    @endif
  </h1>

  {{-- Meta --}}
  <div class="mt-2 flex flex-wrap items-center gap-3 text-sm text-gray-500">
    @if(isset($recipe->user) || (method_exists($recipe,'relationLoaded') && $recipe->relationLoaded('user')))
      <span>by {{ optional($recipe->user)->name ?? 'Unknown' }}</span>
    @endif
    <time datetime="{{ $recipe->created_at }}">
      {{ $recipe->created_at->diffForHumans() }}
    </time>
  </div>

  {{-- Divider --}}
  <div class="my-5 h-px bg-gradient-to-r from-transparent via-gray-100 to-transparent"></div>

  {{-- Description --}}
  @if(!empty($recipe->description))
    <div class="prose prose-sm max-w-none text-gray-700">
      @if($isFull)
        <p class="whitespace-pre-line">{{ $recipe->description }}</p>
      @else
        <p class="line-clamp-5">{{ \Illuminate\Support\Str::limit($recipe->description, $descLimit) }}</p>
      @endif
    </div>
  @endif

  {{-- Footer link for compact only --}}
  @unless($isFull)
    <div class="mt-5">
      <a href="{{ route('recipes.show', $recipe) }}"
         class="inline-flex items-center text-sm font-medium text-sky-700 hover:underline">
        Read full recipe →
      </a>
    </div>
  @endunless
</article>


