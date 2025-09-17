<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-900">
    <header class="bg-white border-b">
        <div class="mx-auto max-w-3xl p-4">
          MENU WILL COME HERE
            <a href="/recipes" class="text-lg font-semibold hover:underline">Recipes</a>
        </div>
    </header>

    <main class="mx-auto max-w-3xl p-4">
        {{ $slot }}
    </main>

    <footer class="mx-auto max-w-3xl p-4 text-sm text-gray-500">
        FOOTER WILL COME HERE
    </footer>
</body>
</html>