<div class="idea-and-buttons container">
    <div class="idea-container flex mt-4 bg-white rounded-xl">
        <div class="flex flex-col md:flex-row flex-1 px-4 py-6">
            <div class="flex-none mx-2 md:mx-4">
                <a href="#" class="flex-none">
                    <img src="{{  $idea->user->getAvatar()  }}" alt="avatar" class="w-14 h-14 rounded-xl">
                </a>
            </div>
            <div class="w-full mx-2 md:mx-4">
                <h4 class="text-xl font-semibold mt-2 md:mt-0">
                    <a href="#">
                        {{  $idea->title  }}
                    </a>
                </h4>
                <div class="text-gray-600 mt-3 line-clamp-3">
                    {{  $idea->description  }}
                </div>
                <div class="flex flex-col md:flex-row md:items-center justify-between mt-6">
                    <div class="flex items-center text-xs font-semibold text-gray-400 md:space-x-2">
                        <div class="hidden md:block font-bold text-gray-900">
                            {{  $idea->user->name  }}
                        </div>
                        <div class="hidden md:block">
                            &bull;
                        </div>
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
                    <div class="flex items-center space-x-2 mt-4 md:mt-0">
                        <div class="{{  Str::kebab($idea->status->name)  }}  text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2">
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
                                    class="z-10 absolute w-44 text-left md:ml-8 top-8 md:top-6 right-0 md:left-0 py-3 font-semi-bold bg-white shadow-dialog rounded-xl"
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
                </div>
            </div>
            <div class="flex md:hidden mt-4 md:mt-0">
                <div class="bg-gray-100 text-center rounded-xl h-10 px-4 py-2 pr-8">
                    <div class="text-sm font-bold leading-none @if($hasVoted) text-blue data-test-votes-count-blue @endif">
                        {{  $votesCount  }}
                    </div>
                    <div class="text-xxs font-semibold leading-none text-gray-400">
                        Votes
                    </div>
                </div>
                @if ($hasVoted)
                    <button 
                        class="w-20 -mx-5 px-4 py-3 text-white bg-blue font-bold text-xxs uppercase rounded-xl border border-blue hover:border-blue-hover transition duration-150 ease-in"
                        data-test="vote-button-has-voted"
                    >
                        Vote
                    </button>
                @else
                    <button 
                        class="w-20 -mx-5 px-4 py-3 bg-gray-200 font-bold text-xxs uppercase rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in"
                    >
                        Vote
                    </button>
                @endif
            </div>
        </div>   
    </div> <!-- end idea container -->   
    <div class="buttons-container flex items-center justify-between mt-4">
        <div class="flex flex-col md:flex-row items-center space-x-4 md:ml-6">
            <div 
                x-data="{ isOpen: false }"
                class="relative"
            >
                <button 
                    @click="isOpen = !isOpen"
                    type="button"
                    class="flex items-center justify-center w-32 h-11 text-white text-sm bg-blue font-semibold rounded-xl hover:bg-blue-hover transition duration-150 ease-in px-6 py-2"
                    >
                    Reply
                </button>
                <!-- Reply popup -->
                <div 
                    x-show="isOpen"
                    x-transition.origin.top.left
                    @click.away="isOpen = false"
                    @keydown.escape.window="isOpen=false"
                    class="absolute z-10 w-64 md:w-104 text-left font-semibold text-sm bg-white shadow-dialog rounded-xl mt-2"
                    >
                    <form action="#" method="post" class="space-y-4 px-4 py-6">
                        <div>
                            <textarea name="post_comment" id="post_comment" cols="30" rows="4" class="w-full text-sm bg-gray-100 rounded-xl placeholder-gray-900 border-none px-4 py-2" placeholder="Go ahead don't be shy. Share your thoughts.."></textarea>
                            <div class="flex flex-col md:flex-row items-center md:space-x-3 mt-4">
                                <button 
                                    type="button"
                                    class="flex items-center justify-center w-full md:w-1/2 h-11 text-white text-sm bg-blue font-semibold rounded-xl hover:bg-blue-hover transition duration-150 ease-in px-6 py-2"
                                    >
                                    Post Comment
                                </button>
                                <button 
                                    type="button"
                                    class="flex items-center justify-center w-full mt-2 md:mt-0 md:w-32 h-11 text-sm bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-2">
                                    <svg fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-gray-600 overflow-visible -rotate-45">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
                                    </svg>
                                    <span class="ml-1"> Attach</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div 
                x-data="{ isOpen: false }"
                class="relative mt-2 md:mt-0"
            >
                <button 
                    @click="isOpen = !isOpen"
                    type="button"
                    class="flex items-center justify-center w-36 h-11 text-sm
                    bg-gray-200 font-semibold rounded-xl border border-gray-200
                    hover:border-gray-400 transition duration-150 ease-in 
                    px-6 py-2">
                    <span>Set status</span>
                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 ml-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>
                </button>
                <!-- set status popup -->
                <div 
                    x-show="isOpen"
                    x-transition.origin.top.left
                    @click.away="isOpen = false"
                    @keydown.escape.window="isOpen=false"
                    class="absolute z-20 w-76 text-left font-semibold text-sm bg-white shadow-dialog rounded-xl mt-2"
                >
                    <form action="#" method="post" class="space-y-4 px-4 py-6">
                        <!-- select statuses to add -->
                        <div class="space-y-2">
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" checked="" class="bg-gray-200 text-black border-none" name="radio-direct" value="1">
                                    <span class="ml-2">Open</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" checked="" class="bg-gray-200 text-purple border-none" name="radio-direct" value="2">
                                    <span class="ml-2">Considering</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" checked="" class="bg-gray-200 text-yellow border-none" name="radio-direct" value="3">
                                    <span class="ml-2">In Progress</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" checked="" class="bg-gray-200 text-green border-none" name="radio-direct" value="4">
                                    <span class="ml-2">Implemented</span>
                                </label>
                            </div>
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="radio" checked="" class="bg-gray-200 text-red border-none" name="radio-direct" value="5">
                                    <span class="ml-2">Closed</span>
                                </label>
                            </div>
                            <!-- textarea -->
                            <div>
                                <textarea name="update_comment" id="update_comment" cols="30" rows="3" class="w-full text-sm bg-gray-100 rounded-xl placeholder-gray-900 border-none px-4 py-2" placeholder="Add an update comment (optional)"></textarea>
                            </div>
                            <!-- buttons -->
                            <div class="flex items-center space-x-3 mt-4">
                                <button 
                                    type="button"
                                    class="flex items-center justify-center w-32 h-11 text-sm bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-2">
                                    <svg fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-gray-600 overflow-visible -rotate-45">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
                                    </svg>
                                    <span class="ml-1"> Attach</span>
                                </button>
                                <button 
                                    type="button"
                                    class="flex items-center justify-center w-1/2 h-11 text-white text-sm bg-blue font-semibold rounded-xl hover:bg-blue-hover transition duration-150 ease-in px-6 py-2"
                                    >
                                    Update
                                </button>
                            </div>
                        </div>
                        <!-- checkbox -->
                        <div>
                            <label class="font-normal inline-flex items-center">
                                <input type="checkbox" name="notify_voters" class="rounded bg-gray-200" checked="">
                                <span class="ml-2">Notify all voters</span>
                            </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="hidden md:flex items-center space-x-3">
            <div class="bg-white font-semibold text-center rounded-xl px-3 py-2">
                <div class="text-xl leading-snug @if($hasVoted) text-blue @endif">
                    {{  $votesCount  }}
                </div>
                <div class="text-gray-400 text-xs leading-none">
                    Votes
                </div>                
            </div>
            @if ($hasVoted)
                <button 
                    type="button"
                    class="w-32 h-11 text-xs text-white bg-blue font-semibold uppercase rounded-xl border border-blue hover:blue-hover transition duration-150 ease-in px-6 py-2">
                    <span>Vote</span>
                </button>
            @else
                <button 
                    type="button"
                    class="w-32 h-11 text-xs bg-gray-200 font-semibold uppercase rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-2">
                    <span>Vote</span>
                </button>
            @endif
        </div>
    </div> <!-- end buttons container -->  
</div>