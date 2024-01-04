<div class="comment-container relative mt-4 bg-white rounded-xl flex">
    <div class="flex flex-col md:flex-row flex-1 px-4 py-6">
        <div class="flex-none">
            <a href="#" class="flex-none">
                <img src="{{  $comment->user->getAvatar()  }}" alt="avatar" class="w-14 h-14 rounded-xl">
            </a>
        </div>
        <div class="w-full mx-0 md:mx-4">
            <!-- <h4 class="text-xl font-semibold">
                <a href="#">
                    A random title can go here
                </a>
            </h4> -->
            <div class="text-gray-600 mt-3 line-clamp-3 mt-2 md:mt-0">
                {{  $comment->body  }}
            </div>
            <div class="flex items-center justify-between mt-6">
                <div class="flex items-center text-xs font-semibold text-gray-400 space-x-2">
                    <div class="font-bold text-gray-900">
                        {{  $comment->user->name  }}
                    </div>
                    <div>
                        &bull;
                    </div>
                    <div>
                        {{  $comment->created_at->diffForHumans()  }}
                    </div>
                </div>
                <div class="flex items-center space-x-2">
                    <div                                
                        x-data="{ isOpen: false }" 
                        class="relative"
                        >
                        <button 
                            @click="isOpen = !isOpen"
                            class="relative px-4 py-2 bg-gray-100 hover:bg-gray-200 border rounded-full h-7 transition duration-150 ease-in"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3"/>
                            </svg>
                        </button>
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
                    </div>                            
                </div>
            </div>
        </div>
    </div>         
</div> 