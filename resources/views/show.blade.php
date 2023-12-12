<x-app-layout>
    <div>
        <a href="/" class="flex items-center font-semibold hover:underline">
            <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
            <span class="ml-2"> All ideas</span>
        </a>
    </div> <!-- end going back -->
    <div class="idea-container mt-4 bg-white rounded-xl flex">
        <div class="flex flex-1 px-4 py-6">
            <div class="flex-none">
                <a href="#" class="flex-none">
                    <img src="https://source.unsplash.com/200x200/?face&crop=face&v=1" alt="avatar" class="w-14 h-14 rounded-xl">
                </a>
            </div>
            <div class="w-full mx-4">
                <h4 class="text-xl font-semibold">
                    <a href="#">
                        A random title can go here
                    </a>
                </h4>
                <div class="text-gray-600 mt-3 line-clamp-3">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Esse eum natus asperiores quos distinctio consequuntur? Ducimus beatae soluta excepturi sequi quidem sint, odio velit tempore illo voluptate consequatur aut minus delectus molestias hic natus vitae? Quisquam, praesentium consequatur. Voluptas nostrum quibusdam exercitationem ea harum enim voluptate dolor sed quis voluptatem, impedit minima? Veritatis ratione natus voluptas nobis eligendi eum et veniam, laborum perferendis. Quia qui, veritatis recusandae dignissimos perferendis nostrum, quam deserunt rerum adipisci nesciunt quas est sit ad tempore, velit nulla nam minus porro harum accusantium. Architecto omnis veniam voluptatum, iusto, dolores ipsum beatae iure quod, amet consequatur eveniet.
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
                        <div>
                            &bull;
                        </div>
                        <div>
                            Category 1
                        </div>
                        <div>
                            &bull;
                        </div>
                        <div class="text-gray-900">                            
                            3 Comments
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="bg-gray-200 text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2">
                            Open
                        </div>
                        <button class="relative px-4 py-2 bg-gray-100 hover:bg-gray-200 border rounded-full h-7 transition duration-150 ease-in">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>         
    </div> <!-- end idea container -->   
    <div class="buttons-container flex items-center justify-between mt-4">
        <div class="flex items-center space-x-4 ml-6">
            <button 
                type="button"
                class="flex items-center justify-center w-32 h-11 text-white text-xs bg-blue font-semibold rounded-xl hover:bg-blue-hover transition duration-150 ease-in px-6 py-2">
                <span class="ml-1"> Reply</span>
            </button>
            <button 
                type="button"
                class="flex items-center justify-center w-36 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-2">
                <span>Set status</span>
                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg>
            </button>
        </div>
        <div class="flex items-center space-x-3">
            <div class="bg-white font-semibold text-center rounded-xl px-3 py-2">
                <div class="text-xl leading-snug">
                    12
                </div>
                <div class="text-gray-400 text-xs leading-none">
                    Votes
                </div>                
            </div>
            <button 
                type="button"
                class="w-32 h-11 text-xs bg-gray-200 font-semibold uppercase rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-2">
                <span>Vote</span>
            </button>
        </div>
    </div> <!-- end buttons container -->  
    <div class="comments-container relative space-y-6 ml-22 my-8">
        <div class="comment-container relative mt-4 bg-white rounded-xl flex">
            <div class="flex flex-1 px-4 py-6">
                <div class="flex-none">
                    <a href="#" class="flex-none">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=2" alt="avatar" class="w-14 h-14 rounded-xl">
                    </a>
                </div>
                <div class="w-full mx-4">
                    <!-- <h4 class="text-xl font-semibold">
                        <a href="#">
                            A random title can go here
                        </a>
                    </h4> -->
                    <div class="text-gray-600 mt-3 line-clamp-3">
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
                            <button class="relative px-4 py-2 bg-gray-100 hover:bg-gray-200 border rounded-full h-7 transition duration-150 ease-in">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                    <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>         
        </div> <!-- end comment container -->   
        <div class="comment-container is-admin relative mt-4 bg-white rounded-xl flex">
            <div class="flex flex-1 px-4 py-6">
                <div class="flex-none">
                    <a href="#" class="flex-none">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=3" alt="avatar" class="w-14 h-14 rounded-xl">
                        <div class="font-bold uppercase text-blue text-xxs mt-1 text-center">
                            Admin
                        </div>
                    </a>
                </div>
                <div class="w-full mx-4">
                    <h4 class="text-xl font-semibold">
                        <a href="#">
                            Status Changed to "Under Construction"
                        </a>
                    </h4>
                    <div class="text-gray-600 mt-3 line-clamp-3">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur commodi harum corporis omnis eaque, architecto facilis cupiditate accusantium consequuntur quae. Tenetur veniam ut minima dolore eligendi inventore totam error neque?
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs font-semibold text-gray-400 space-x-2">
                            <div class="font-bold text-blue">
                                Andrea
                            </div>
                            <div>
                                &bull;
                            </div>
                            <div>
                                10 hours ago
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <button class="relative px-4 py-2 bg-gray-100 hover:bg-gray-200 border rounded-full h-7 transition duration-150 ease-in">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                    <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>         
        </div> <!-- end comment container -->   
        <div class="comment-container relative mt-4 bg-white rounded-xl flex">
            <div class="flex flex-1 px-4 py-6">
                <div class="flex-none">
                    <a href="#" class="flex-none">
                        <img src="https://source.unsplash.com/200x200/?face&crop=face&v=2" alt="avatar" class="w-14 h-14 rounded-xl">
                    </a>
                </div>
                <div class="w-full mx-4">
                    <!-- <h4 class="text-xl font-semibold">
                        <a href="#">
                            A random title can go here
                        </a>
                    </h4> -->
                    <div class="text-gray-600 mt-3 line-clamp-3">
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
                            <button class="relative px-4 py-2 bg-gray-100 hover:bg-gray-200 border rounded-full h-7 transition duration-150 ease-in">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                    <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>         
        </div> <!-- end comment container -->   
    </div> <!-- end comments container -->  
</x-app-layout>