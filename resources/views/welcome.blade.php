@extends('layouts.app')

@section('title','Welcome')

@section('content')
  {{-- Hero --}}
  <section class="text-center mb-10">
    <h1 class="text-4xl font-bold tracking-tight">Welcome to Sotasty!</h1>
    <p class="mt-2 text-gray-600">Discover simple, tasty recipes.</p>
  </section>

  {{-- Latest Recipes --}}
  <div class="flex items-baseline justify-between mb-4">
    <h2 class="text-2xl font-semibold">Latest Recipes</h2>
    <a href="{{ route('recipes.index') }}" class="text-sm underline">See all</a>
  </div>

  @if(!empty($latestRecipes) && $latestRecipes->count())
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      @foreach($latestRecipes as $recipe)
        <article class="bg-white rounded-2xl shadow p-5">
          <h3 class="text-lg font-semibold leading-snug">
            <a href="{{ route('recipes.show', $recipe) }}" class="hover:underline">
              {{ $recipe->title }}
            </a>
          </h3>

          @if(!empty($recipe->description))
            <p class="mt-2 text-sm text-gray-600">
              {{ \Illuminate\Support\Str::limit($recipe->description, 120) }}
            </p>
          @endif

          <div class="mt-4 flex items-center justify-between text-xs text-gray-500">
            <time datetime="{{ $recipe->created_at }}">
              {{ $recipe->created_at->diffForHumans() }}
            </time>
          </div>
        </article>
      @endforeach
    </div>
  @else
    <p class="text-gray-500">No recipes yet.</p>
  @endif
@endsection
