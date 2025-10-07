
<x-layouts.app.guest :title="$title ?? null">

@if(session('success'))
  <x-message-block type="success">
      {{ session('success') }}
  </x-message-block>
@endif

@if(session('error'))
  <x-message-block type="error">
      {{ session('error') }}
  </x-message-block>
@endif

    <flux:main>
        {{ $slot }}
    </flux:main>

</x-layouts.app.guest>
