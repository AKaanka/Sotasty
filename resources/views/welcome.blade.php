<x-layouts.app :title="'Welcome'">
  {{-- Hero --}}
  <section class="text-center mb-10">
    <h1 class="text-5xl sm:text-6xl font-bold tracking-tight">Welcome to SoTasty!</h1>
    <p class="mt-2 text-gray-600">Discover simple, tasty recipes shared by the community.</p>
  </section>

  {{-- Latest Recipes --}}
  <section class="mx-auto max-w-6xl px-4 pb-16 sm:px-6 lg:px-8">
    <div class="mb-6">
      <h2 class="text-2xl font-semibold">Latest recipes</h2>
      <p class="mt-1 text-sm text-gray-500">Fresh from our cooks.</p>
    </div>

    @if(!empty($latestRecipes) && $latestRecipes->count())
      <div class="grid grid-cols-1 gap-8 sm:grid-cols-2">
        @foreach($latestRecipes as $recipe)
          <x-recipes.card :recipe="$recipe" variant="compact" />
        @endforeach
      </div>
    @else
      <p class="text-gray-500">No recipes yet.</p>
    @endif
  </section>
</x-layouts.app>


