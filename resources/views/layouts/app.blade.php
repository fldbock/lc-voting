<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laracasts Voting</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="font-sans bg-gray-background text-gray-900 text-sm px-10">
        <header class="flex items-center justify-between px-8 py-4">            
            <a href="#"><img src="{{ asset('img/logo-dark.svg') }}" alt=""></a>
            <div class="flex items-center">
                @if (Route::has('login'))
                    <livewire:welcome.navigation />
                @endif
                <a href="#">
                    <img src="https://www.gravatar.com/avatar/000000000?d=mp" alt="avatar" class="w-10 h-10 rounded-full">
                </a>
            </div>
        </header>

        {{  $slot  }}
    </body>
</html>
