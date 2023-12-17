<div 
    x-data
    @click="
        const clicked = $event.target;
        const tagName = clicked.tagName.toLowerCase();

        const ignores = ['button', 'svg', 'path', 'a'];
        if (!ignores.includes(tagName)){
            clicked.closest('.idea-container').querySelector('.idea-link').click();
        }
    "
    class="idea-container bg-white rounded-xl flex hover:shadow-md transition duration-150 ease-in cursor-pointer"
>
    <!-- votes section md: screens -->
    <div class="hidden md:block border-r border-gray-100 px-5 py-8">
        <div class="text-center">
            <div class="font-semibold text-2xl">
                {{  $votesCount  }}
            </div>
            <div class="text-gray-500">
                Votes
            </div>
            <div class="mt-8">
                <button class="w-20 px-4 py-3 bg-gray-200 font-bold text-xxs uppercase rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in">
                    Vote
                </button>
            </div>
        </div>
    </div>
    
    <div class="flex flex-col md:flex-row flex-1 px-2 py-6">
        <!-- image section -->
        <div class="flex-none mx-2 md:mx-4">
            <a href="#" class="flex-none">
                <img src="{{  $idea->user->getAvatar()  }}" alt="avatar" class="w-14 h-14 rounded-xl">
            </a>
        </div>
        <!-- idea card -->
        <div class="flex flex-col justify-between w-full mx-2 md:mx-4">
            <!-- title -->
            <h4 class="text-xl font-semibold mt-2 md:mt-0">
                <a href="{{  route('idea.show', $idea)  }}" class="idea-link hover:underline">
                    {{  $idea->title  }}
                </a>
            </h4>
            <!-- description -->
            <div class="text-gray-600 mt-3 line-clamp-3">
                {{  $idea->description  }}
            </div>
            <!-- idea card footer -->
            <div class="flex flex-col md:flex-row md:items-center justify-between mt-6">
                <div class="flex items-center text-xs font-semibold text-gray-400 md:space-x-2">
                    <div>
                        {{  $idea->created_at->diffForHumans()  }}
                    </div>
                    <div>
                        &bull;
                    </div>
                    <div>
                        {{  $idea->category->name  }}
                    </div>
                    <div>
                        &bull;
                    </div>
                    <div class="text-gray-900">                            
                        3 Comments
                    </div>
                </div>
                <!-- status and more button -->
                <div class="flex items-center space-x-2 mt-4 md:mt-0 ">
                    <div class="{{  Str::kebab($idea->status->name)  }} text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2">
                        {{  $idea->status->name  }}
                    </div>
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
                            class="absolute w-44 text-left md:ml-8 py-3 top-8 md:top-6 right-0 md:left-0 font-semi-bold bg-white shadow-dialog rounded-xl"
                            style="display:none;"
                        >
                            <li>
                                <a href="#" class="block hover:bg-gray-100 px-5 py-3 transition duration-150 ease-in">
                                    Mark as Spam
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block hover:bg-gray-100 px-5 py-3 transition duration-150 ease-in">
                                    Delete post
                                </a>
                            </li>
                        </ul>
                    </button>
                </div>
                <!-- votes section small screens -->
                <div class="flex md:hidden mt-4 md:mt-0">
                    <div class="bg-gray-100 text-center rounded-xl h-10 px-4 py-2 pr-8">
                        <div class="text-sm font-bold leading-none">
                            {{  $votesCount  }}
                        </div>
                        <div class="text-xxs font-semibold leading-none text-gray-400">
                            Votes
                        </div>
                    </div>
                    <button 
                        class="w-20 -mx-5 px-4 py-3 bg-gray-200 font-bold text-xxs uppercase rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in"
                    >
                        Vote
                    </button>
                </div>
            </div>
        </div>
    </div>         
</div> <!-- end idea container -->      
