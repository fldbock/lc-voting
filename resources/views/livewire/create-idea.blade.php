<form wire:submit.prevent="createIdea" action="#" method="POST" class="space-y-4 px-4 py-6">
    <!-- Title -->
    <div>
        <input wire:model.defer="title" type="text" class="w-full text-sm bg-gray-100 border-none rounded-xl placeholder-gray-900 px-4 py-2" placeholder="Your Idea" required>
        @error('title')
            <p class="text-red text-xs mt-1">
                {{  $message  }}
            </p>
        @enderror
    </div>
    <!-- Category -->
    <div>
        <select wire:model.defer="category" name="category_add" id="category_add" class="w-full text-sm bg-gray-100 rounded-xl border-none px-4 py-2">
            @foreach ($categories as $category)
                <option value="{{  $category->id  }}">{{  $category->name  }}</option>
            @endforeach
        </select>
        @error('category')
            <p class="text-red text-xs mt-1">
                {{  $message  }}
            </p>
        @enderror
    </div>
    <!-- Description -->
    <div>
        <textarea wire:model.defer="description" name="idea" id="idea" cols="30" rows="4" class="w-full bg-gray-100 rounded-xl border-none placeholder-gray-900 text-sm px-4 py-2" placeholder="Describe your idea" required></textarea>
        @error('description')
            <p class="text-red text-xs mt-1">
                {{  $message  }}
            </p>
        @enderror
    </div>
    <!-- Buttons -->
    <div class="flex items-center justify-between space-x-3">
        <button 
            type="button"
            class="flex items-center justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3">
            <svg fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-gray-600 overflow-visible -rotate-45">
                <path stroke-linecap="round" stroke-linejoin="round" d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
            </svg>
            <span class="ml-1"> Attach</span>
        </button>
        <button 
            type="submit"
            class="flex items-center justify-center w-1/2 h-11 text-white text-xs bg-blue font-semibold rounded-xl hover:bg-blue-hover transition duration-150 ease-in px-6 py-3">
            <span class="ml-1"> Submit</span>
        </button>
    </div>
    <!-- Success Message -->
    @if (session('success_message'))
        <div 
            x-data="{ isVisible: true }"
            x-init="
                setTimeout(() => {
                    isVisible = false
                }, 5000)
            "
            x-show.transition.duration.1000ms="isVisible"
            class="text-green mt-4"        
        >
            {{  session('success_message')  }}
        </div>
    @endif
</form>
