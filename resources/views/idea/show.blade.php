<x-app-layout>
    <div>
        <a href="/" class="flex items-center font-semibold hover:underline">
            <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
            <span class="ml-2"> All ideas</span>
        </a>
    </div> <!-- end going back -->

    <!-- Showing the idea -->
    <livewire:idea-show :idea="$idea" :votesCount="$votesCount" :hasVoted="$hasVoted"/>

    <!-- Comments container -->
    <div class="comments-container relative space-y-6 md:ml-22 my-8">
        <div class="comment-container relative mt-4 bg-white rounded-xl flex">
            <div class="flex flex-col md:flex-row flex-1 px-4 py-6">
                <div class="flex-none">
                    <a href="#" class="flex-none">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=2" alt="avatar" class="w-14 h-14 rounded-xl">
                    </a>
                </div>
                <div class="w-full mx-0 md:mx-4">
                    <!-- <h4 class="text-xl font-semibold">
                        <a href="#">
                            A random title can go here
                        </a>
                    </h4> -->
                    <div class="text-gray-600 mt-3 line-clamp-3 mt-2 md:mt-0">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur commodi harum corporis omnis eaque, architecto facilis cupiditate accusantium consequuntur quae. Tenetur veniam ut minima dolore eligendi inventore totam error neque?
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs font-semibold text-gray-400 space-x-2">
                            <div class="font-bold text-gray-900">
                                John Doe
                            </div>
                            <div>
                                &bull;
                            </div>
                            <div>
                                10 hours ago
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <button 
                                x-data="{ isOpen: false }"
                                @click="isOpen = !isOpen"
                                class="relative px-4 py-2 bg-gray-100 hover:bg-gray-200 border rounded-full h-7 transition duration-150 ease-in"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                    <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3"/>
                                </svg>
                                <ul 
                                    x-show="isOpen"
                                    x-transition.origin.top.left
                                    @click.away="isOpen = false"
                                    @keydown.escape.window="isOpen=false"
                                    class="z-10 absolute w-44 text-left ml-8 py-3 font-semi-bold bg-white shadow-dialog rounded-xl"
                                    style="display:none;"
                                >
                                    <li>
                                        <a href="#" class="block hover:bg-gray-100 px-5 py-3 transition duration-150 ease-in">
                                            Mark as Spam
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="block hover:bg-gray-100 px-5 py-3 transition duration-150 ease-in">
                                            Delete Comment
                                        </a>
                                    </li>
                                </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>         
        </div> <!-- end comment container -->   
        <div class="comment-container relative mt-4 bg-white rounded-xl flex">
            <div class="flex flex-col md:flex-row flex-1 px-4 py-6">
                <div class="flex-none">
                    <a href="#" class="flex-none">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=3" alt="avatar" class="w-14 h-14 rounded-xl">
                    </a>
                </div>
                <div class="w-full mx-0 md:mx-4">
                    <!-- <h4 class="text-xl font-semibold">
                        <a href="#">
                            A random title can go here
                        </a>
                    </h4> -->
                    <div class="text-gray-600 mt-3 line-clamp-3 mt-2 md:mt-0">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur commodi harum corporis omnis eaque, architecto facilis cupiditate accusantium consequuntur quae. Tenetur veniam ut minima dolore eligendi inventore totam error neque?
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs font-semibold text-gray-400 space-x-2">
                            <div class="font-bold text-gray-900">
                                John Doe
                            </div>
                            <div>
                                &bull;
                            </div>
                            <div>
                                10 hours ago
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <button 
                                x-data="{ isOpen: false }"
                                @click="isOpen = !isOpen"
                                class="relative px-4 py-2 bg-gray-100 hover:bg-gray-200 border rounded-full h-7 transition duration-150 ease-in"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                    <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3"/>
                                </svg>
                                <ul 
                                    x-show="isOpen"
                                    x-transition.origin.top.left
                                    @click.away="isOpen = false"
                                    @keydown.escape.window="isOpen=false"
                                    class="z-10 absolute w-44 text-left ml-8 py-3 font-semi-bold bg-white shadow-dialog rounded-xl"
                                    style="display:none;"
                                >
                                    <li>
                                        <a href="#" class="block hover:bg-gray-100 px-5 py-3 transition duration-150 ease-in">
                                            Mark as Spam
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="block hover:bg-gray-100 px-5 py-3 transition duration-150 ease-in">
                                            Delete Comment
                                        </a>
                                    </li>
                                </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>         
        </div> <!-- end comment container -->   
        <div class="comment-container relative mt-4 bg-white rounded-xl flex">
            <div class="flex flex-col md:flex-row flex-1 px-4 py-6">
                <div class="flex-none">
                    <a href="#" class="flex-none">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=4" alt="avatar" class="w-14 h-14 rounded-xl">
                    </a>
                </div>
                <div class="w-full mx-0 md:mx-4">
                    <!-- <h4 class="text-xl font-semibold">
                        <a href="#">
                            A random title can go here
                        </a>
                    </h4> -->
                    <div class="text-gray-600 mt-3 line-clamp-3 mt-2 md:mt-0">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur commodi harum corporis omnis eaque, architecto facilis cupiditate accusantium consequuntur quae. Tenetur veniam ut minima dolore eligendi inventore totam error neque?
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs font-semibold text-gray-400 space-x-2">
                            <div class="font-bold text-gray-900">
                                John Doe
                            </div>
                            <div>
                                &bull;
                            </div>
                            <div>
                                10 hours ago
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <button 
                                x-data="{ isOpen: false }"
                                @click="isOpen = !isOpen"
                                class="relative px-4 py-2 bg-gray-100 hover:bg-gray-200 border rounded-full h-7 transition duration-150 ease-in"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                    <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3"/>
                                </svg>
                                <ul 
                                    x-show="isOpen"
                                    x-transition.origin.top.left
                                    @click.away="isOpen = false"
                                    @keydown.escape.window="isOpen=false"
                                    class="z-10 absolute w-44 text-left ml-8 py-3 font-semi-bold bg-white shadow-dialog rounded-xl"
                                    style="display:none;"
                                >
                                    <li>
                                        <a href="#" class="block hover:bg-gray-100 px-5 py-3 transition duration-150 ease-in">
                                            Mark as Spam
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="block hover:bg-gray-100 px-5 py-3 transition duration-150 ease-in">
                                            Delete Comment
                                        </a>
                                    </li>
                                </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>         
        </div> <!-- end comment container -->   
    </div> <!-- end comments container -->  
</x-app-layout>