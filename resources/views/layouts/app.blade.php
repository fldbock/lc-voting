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

    <body class="font-sans bg-gray-background text-gray-900 text-sm px-2 md:px-10">
        <header class="flex flex-col md:flex-row items-center justify-between px-8 py-4">            
            <a href="#"><img src="{{ asset('img/logo-dark.svg') }}" alt=""></a>
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
                            Let us know what you would like and we'll take a look over!
                        </p>
                    </div>    
                    <form action="#" method="POST" class="space-y-4 px-4 py-6">
                        <div>
                            <input type="text" class="w-full text-sm bg-gray-100 border-none rounded-xl placeholder-gray-900 px-4 py-2" placeholder="Your Idea">
                        </div>
                        <div>
                            <select name="category_add" id="category_add" class="w-full text-sm bg-gray-100 rounded-xl border-none px-4 py-2">
                                <option value="Category One">Category One</option>
                                <option value="Category Two">Category Two</option>
                                <option value="Category Three">Category Three</option>
                                <option value="Category Four">Category Four</option>
                            </select>
                        </div>
                        <div>
                            <textarea name="idea" id="idea" cols="30" rows="4" class="w-full bg-gray-100 rounded-xl border-none placeholder-gray-900 text-sm px-4 py-2" placeholder="Describe your idea"></textarea>
                        </div>
                        <div class="flex items-center justify-between space-x-3">
                            <button 
                                type="button"
                                class="flex items-center justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-2">
                                <svg fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-gray-600 overflow-visible -rotate-45">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
                                </svg>
                                <span class="ml-1"> Attach</span>
                            </button>
                            <button 
                                type="submit"
                                class="flex items-center justify-center w-1/2 h-11 text-white text-xs bg-blue font-semibold rounded-xl hover:bg-blue-hover transition duration-150 ease-in px-6 py-2">
                                <span class="ml-1"> Submit</span>
                            </button>
                        </div>
                    </form>
                </div>   
            </div>
            <div class="w-full md:w-175 px-2 md:px-0">
                <nav class="hidden md:flex items-center justify-between text-xs">
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
