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
        @livewireStyles
        @livewireScripts
    </head>

    <body class="font-sans bg-gray-background text-gray-900 text-sm px-2 md:px-10">
        <header class="flex flex-col md:flex-row items-center justify-between px-8 py-4">            
            <a href="/"><img src="{{ asset('img/logo-dark.svg') }}" alt=""></a>
            <div class="flex items-center mt-2 md:mt-0">
                @if (Route::has('login'))
                    <livewire:welcome.navigation />
                @endif
                <a href="#">
                    <img src="https://www.gravatar.com/avatar/000000000?d=mp" alt="avatar" class="w-10 h-10 rounded-full">
                </a>
            </div>
        </header>

        <main class="container mx-auto max-w-custom flex flex-col md:flex-row">
            <div class="mx-auto md:mr-5 w-70">
                <div
                    class="md:sticky top-8 bg-white border-2 border-transparent rounded-xl mt-16"
                    style="
                        background-image: linear-gradient(to bottom, #ffffff, #ffffff), linear-gradient(to bottom, rgba(50, 138, 241, 0.22), rgba(99, 123, 255, 0));
                        background-origin: border-box;
                        background-clip: content-box, border-box;
                    "
                >
                    <div class="text-center px-6 py-2 pt-6">
                        <h3 class="font-semibold text-base">Add an idea</h3>
                        <p class="text-xs mt-4">
                            @auth
                                Let us know what you would like and we'll take a look over!
                            @else
                                Please login to create an idea.
                            @endauth
                        </p>
                    </div>    
                    @auth
                        <livewire:create-idea />
                    @else
                        <div class="flex flex-col items-center space-y-4 my-6 text-center">
                            <a 
                                href = "{{  route('login')  }}"
                                class="w-1/2 h-11 text-white text-xs bg-blue font-semibold rounded-xl hover:bg-blue-hover transition duration-150 ease-in px-6 py-3"
                            >
                                Login
                            </a>
                            <a 
                                href = "{{  route('register')  }}"
                                class="w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3"
                            >
                                Signup
                            </a>
                        </div>
                    @endauth
                </div>   
            </div>
            <div class="w-full md:w-175 px-2 md:px-0">
                <livewire:status-filters />
                <div class="mt-8">
                    {{  $slot  }}
                </div>
            </div>
        </main>

        <!-- Success Message Notification -->
        @if (session('success'))
            <x-notification-success 
                :redirect=true 
                message="{{  session('success')  }}" 
            />
        @endif
    </body>
</html>
