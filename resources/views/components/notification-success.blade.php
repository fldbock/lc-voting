<div
    x-data = "{isOpen: false}"
>
    <button @click="isOpen = true">
        Toggle
    </button>
    <div 
        x-cloak
        x-show = "isOpen"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-90 translate-x-8"
        x-transition:enter-end="opacity-100 scale-100 translate-x-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 scale-100 translate-x-0"
        x-transition:leave-end="opacity-0 scale-90 translate-x-8"
        @keydown.escape.window="isOpen = false"
        x-init="
                setTimeout(() => {
                    isOpen = false
                }, 5000)
            "
        class="z-10 flex justify-between max-w-xs md:max-w-sm w-full fixed bottom-0 right-0 bg-white rounded-xl shadow-lg px-4 py-5 mx-2 sm:mx-6 my-8"
        >
        <div class="flex items-center">
            <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-green">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            <div class="font-semibold text-gray-500 text-sm sm:text-base ml-2">
                Idea was updated succesfully!
            </div>
        </div>
        <button @click="isOpen = false" class="text-gray-400 hover:text-gray-500">
            <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
</div>