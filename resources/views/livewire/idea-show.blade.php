<div class="idea-and-buttons container">
    <div class="idea-container flex mt-4 bg-white rounded-xl">
        <div class="flex flex-col md:flex-row flex-1 px-4 py-6">
            <div class="flex-none mx-2">
                <a href="#" class="flex-none">
                    <img src="{{  $idea->user->getAvatar()  }}" alt="avatar" class="w-14 h-14 rounded-xl">
                </a>
            </div>
            <div class="w-full mx-2 md:mx-4">
                <h4 class="text-xl font-semibold mt-2 md:mt-0">
                    {{  $idea->title  }}
                </h4>
                <div class="text-gray-600 mt-3 line-clamp-3">
                    @admin
                        @if ($idea->spam_reports > 0)
                            <div class="text-red mb-2 data-test-spam-reports-counter">Spam Reports: {{  $idea->spam_reports  }}</div>
                        @endif
                    @endadmin
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
                            {{  $comment_count }} Comments
                        </div>
                    </div>
                    <div class="flex items-center space-x-2 mt-4 md:mt-0">
                        <div class="{{  Str::kebab($idea->status->name)  }}  text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2">
                            {{  $idea->status->name  }}
                        </div>
                        @auth
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
                                    class="z-10 absolute w-44 text-left md:ml-8 top-8 md:top-6 right-0 md:left-0 py-3 font-semi-bold bg-white shadow-dialog rounded-xl"
                                    style="display:none;"
                                >
                                    @can('update', $idea)
                                        <li>
                                            <a         
                                                href="#" 
                                                @click.prevent="
                                                    $dispatch('open-edit-idea-modal')
                                                    isOpen = false
                                                    "
                                                class="block hover:bg-gray-100 px-5 py-3 transition duration-150 ease-in data-test-edit-idea-li"
                                                >
                                                Edit Idea
                                            </a>
                                        </li>
                                    @endcan
                                    @can('delete', $idea)
                                    <li>
                                        <a         
                                            href="#" 
                                            @click.prevent="
                                                $dispatch('open-delete-idea-modal')
                                                isOpen = false
                                                "
                                            class="block hover:bg-gray-100 px-5 py-3 transition duration-150 ease-in data-test-delete-idea-li"
                                            >
                                            Delete Idea
                                        </a>
                                    </li>
                                    @endcan
                                    <li>
                                        <a         
                                            href="#" 
                                            @click.prevent="
                                                $dispatch('open-mark-idea-as-spam-modal')
                                                isOpen = false
                                                "
                                            class="block hover:bg-gray-100 px-5 py-3 transition duration-150 ease-in data-test-mark-idea-as-spam-li"
                                            >
                                            Mark as Spam
                                        </a>
                                    </li>
                                    @admin
                                        <li>
                                            <a         
                                                href="#" 
                                                @click.prevent="
                                                    $dispatch('open-mark-idea-as-not-spam-modal')
                                                    isOpen = false
                                                    "
                                                class="block hover:bg-gray-100 px-5 py-3 transition duration-150 ease-in data-test-mark-idea-as-not-spam-li"
                                                >
                                                Mark as Not Spam
                                            </a>
                                        </li>
                                    @endadmin
                                </ul>
                            </div>   
                            @endauth                     
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
                        wire:click.prevent="vote"
                        class="w-20 -mx-5 px-4 py-3 text-white bg-blue font-bold text-xxs uppercase rounded-xl border border-blue hover:border-blue-hover transition duration-150 ease-in"
                        data-test="vote-button-has-voted"
                    >
                        Vote
                    </button>
                @else
                    <button 
                        wire:click.prevent="vote"
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
                <!-- Create Comment -->
                <livewire:create-comment :idea="$idea"/>
            </div>
            @admin
                <livewire:set-status :idea="$idea" />
            @endadmin
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
                    wire:click.prevent="vote"
                    type="button"
                    class="w-32 h-11 text-xs text-white bg-blue font-semibold uppercase rounded-xl border border-blue hover:blue-hover transition duration-150 ease-in px-6 py-2">
                    <span>Vote</span>
                </button>
            @else
                <button 
                    wire:click.prevent="vote"
                    type="button"
                    class="w-32 h-11 text-xs bg-gray-200 font-semibold uppercase rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-2">
                    <span>Vote</span>
                </button>
            @endif
        </div>
    </div> <!-- end buttons container -->  
</div>