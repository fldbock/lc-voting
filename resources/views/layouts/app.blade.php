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

        <main class="container mx-auto max-w-custom flex">
            <div class="w-70 mr-5">
                Add idea form goes here. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia beatae esse sed officia dolorum dignissimos molestiae eius, neque voluptate quae illum blanditiis recusandae, ea accusamus natus, velit ex nihil. Quidem accusantium explicabo facere nam aliquid perspiciatis a mollitia quia alias, quis esse inventore voluptatum. Placeat, accusamus dignissimos, asperiores hic soluta temporibus itaque provident deserunt nostrum debitis assumenda velit possimus facilis harum vero, minima voluptatem explicabo quo enim dolorum consequuntur. Corporis, placeat. Deleniti incidunt modi perspiciatis consequatur temporibus maiores ipsam repellat! Eaque iusto quod accusamus ratione laudantium consequatur, explicabo quibusdam nesciunt voluptatibus corporis doloremque eveniet, itaque culpa voluptas nisi officia quam.
            </div>
            <div class="w-175">
                    <nav class="flex items-center justify-between text-xs">
                        <ul class="flex uppercase font-semibold space-x-10 border-b-4 pb-3">
                            <li>
                                <a href="#" class="border-b-4 pb-3 border-blue">All Ideas (87)</a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-400 transition duration-150 border-b-4 pb-3 hover:border-blue">Considering (6)</a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-400 transition duration-150 border-b-4 pb-3 hover:border-blue">In Progress (1)</a>
                            </li>
                        </ul>
                        <ul class="flex uppercase font-semibold space-x-10 border-b-4 pb-3">
                            <li>
                                <a href="#" class="text-gray-400 transition duration-150 border-b-4 pb-3 hover:border-blue">Implemented (10)</a>
                            </li>
                            <li>
                                <a href="#" class="text-gray-400 transition duration-150 border-b-4 pb-3 hover:border-blue">Closed (55)</a>
                            </li>
                        </ul>
                    </nav>

                    <div class="mt-8">
                        {{  $slot  }}
                    </div>
            </div>
        </main>
    </body>
</html>
