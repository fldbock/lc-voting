<div 
    x-cloak
    x-show="isOpen"
    x-transition.origin.top.left
    @click.away="isOpen = false"
    @keydown.escape.window="isOpen=false"
    x-on:comment-was-created="isOpen=false"
    class="absolute z-10 w-64 md:w-104 text-left font-semibold text-sm bg-white shadow-dialog rounded-xl mt-2"
    >
    @auth
        <form action="#" method="post" class="space-y-4 px-4 py-6">
            <div>
                <textarea 
                    wire:model="body" 
                    name="post_comment" 
                    id="post_comment" 
                    cols="30" rows="4" 
                    class="w-full text-sm bg-gray-100 rounded-xl placeholder-gray-900 border-none px-4 py-2" 
                    placeholder="Go ahead don't be shy. Share your thoughts.." 
                    required
                >
                </textarea>
                @error('body')
                    <p class="text-red text-xs mt-1">
                        {{  $message  }}
                    </p>
                @enderror
                <div class="flex flex-col md:flex-row items-center md:space-x-3 mt-4">
                    <button 
                        wire:click="createComment"
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
    @else
        <div class="px-4 py-6">
            <p class="font-normal">
                Please login or create an account to post a comment.
            </p>
            <div class="flex items-center space-x-3 mt-8">
                <a 
                    href="{{  route('login')  }}"
                    class="flex items-center justify-center w-1/2 h-11 text-white text-xs bg-blue font-semibold rounded-xl hover:bg-blue-hover transition duration-150 ease-in px-6 py-3"
                >
                    Login
                </a>
                <a 
                    href="{{  route('register')  }}"
                    class="flex items-center justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3"
                >
                    Register
                </a>
            </div>
        </div>
    @endauth
</div>