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
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam obcaecati inventore temporibus, enim, laboriosam ipsum eius mollitia illo aliquid sunt asperiores soluta cupiditate itaque sequi odio alias in molestias non quae iste maiores eos corrupti autem. Doloribus deleniti ea deserunt omnis dolore obcaecati sequi! Architecto, provident iure facere explicabo nam blanditiis consequuntur earum tempora molestiae culpa velit rem, accusantium voluptatum voluptate qui sunt officia accusamus eum magnam illo? Officiis, praesentium voluptas est vero illo eos quis eius explicabo, possimus cumque vitae suscipit quia quaerat harum laborum nihil, dignissimos earum numquam aliquid nobis voluptatem dolor? Eaque nobis adipisci dolore quidem, dolorum quibusdam voluptatibus modi laborum totam facilis voluptas ab quo voluptate sequi, vero corrupti fuga officiis? Laudantium excepturi magnam fugiat blanditiis tenetur sunt quos magni est corrupti quae aspernatur, voluptatem perspiciatis itaque perferendis optio natus. Ut quia quas ipsa deserunt. Vitae, quod ratione quasi quae quam soluta cumque? Fugit pariatur alias neque nemo rem maxime modi minus itaque dolorem amet, nam vitae saepe vel. Consectetur, id atque? A quisquam laborum, quidem doloribus accusantium autem iste, incidunt magnam tempore veniam illum optio voluptas ratione aliquam dolores nam eveniet porro officia amet! Cum minus voluptatibus repellat explicabo tempore quidem atque sequi voluptate corrupti.
            </div>
        </main>
    </body>
</html>
