<x-app-layout>
    <div class="filters flex flex-col md:flex-row space-y-3 md:space-y-0 md:space-x-6">
        <div class="w-full md:w-1/4">
            <select name="category" id="category" class="w-full rounded-xl border-none px-4 py-2">
                <option value="Category One">Category One</option>
                <option value="Category Two">Category Two</option>
                <option value="Category Three">Category Three</option>
                <option value="Category Four">Category Four</option>
            </select>
        </div>
        <div class="w-full md:w-1/4">
            <select name="other_filters" id="other_filters" class="w-full rounded-xl border-none px-4 py-2">
                <option value="Filter One">Filter One</option>
                <option value="Filter Two">Filter Two</option>
                <option value="Filter Three">Filter Three</option>
                <option value="Filter Four">Filter Four</option>
            </select>
        </div>
        <div class="w-full md:w-2/4 relative">
            <input type="search" placeholder="Find an idea" class="w-full rounded-xl bg-white px-4 py-2 pl-8 border-none">
            <div class="absolute top-0 flex h-full ml-2 placeholder-gray-900">
                <svg class="w-4 text-gray-700" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </div>
        </div>
    </div>
    <!-- end filters -->
    <div class="ideas-container space-y-6 my-6 flex flex-col">
        @foreach($ideas as $idea)
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
                <div class="hidden md:block border-r border-gray-100 px-5 py-8">
                    <div class="text-center">
                        <div class="font-semibold text-2xl">
                            12
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
                    <div class="flex-none mx-2 md:mx-4">
                        <a href="#" class="flex-none">
                            <img src="{{  $idea->user->getAvatar()  }}" alt="avatar" class="w-14 h-14 rounded-xl">
                        </a>
                    </div>
                    <div class="flex flex-col justify-between w-full mx-2 md:mx-4">
                        <h4 class="text-xl font-semibold mt-2 md:mt-0">
                            <a href="{{  route('idea.show', $idea)  }}" class="idea-link hover:underline">
                                {{  $idea->title  }}
                            </a>
                        </h4>
                        <div class="text-gray-600 mt-3 line-clamp-3">
                            {{  $idea->description  }}
                        </div>
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
                            <div class="flex items-center space-x-2 mt-4 md:mt-0 ">
                                <div class="bg-gray-200 text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2">
                                    Open
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
                            <div class="flex md:hidden mt-4 md:mt-0">
                                <div class="bg-gray-100 text-center rounded-xl h-10 px-4 py-2 pr-8">
                                    <div class="text-sm font-bold leading-none">12</div>
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
        @endforeach 
    </div><!-- end ideas container -->
    <div class="my-8">
        {{  $ideas->links()  }}
    </div>
</x-app-layout>
