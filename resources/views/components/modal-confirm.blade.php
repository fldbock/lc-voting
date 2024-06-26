@props([
    'event-to-open-modal',
    'event-to-close-modal',
    'title',
    'description',
    'wire-click',
    'confirm-button-text',
])

<div 
    x-cloak
    x-data = "{isOpen: false}"
    x-show = "isOpen"
    @keydown.escape.window="isOpen = false"
    {{  '@' . $eventToOpenModal  }}.window="isOpen = true"
    x-on:{{  $eventToCloseModal  }} = "isOpen = false
"
    class="relative z-10" 
    aria-labelledby="modal-title" 
    role="dialog" 
    aria-modal="true"
    >
    <!-- Background -->
    <div        
        x-show="isOpen"
        x-transition.opacity
        class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
        >
    </div>

    <div
        x-show="isOpen"
        x-transition.duration.400ms.ease-in-out
        class="fixed inset-0 z-10 w-screen overflow-y-auto"
        >
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div class="modal relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                <!-- Close Button -->
                <div class="absolute top-0 right-0 pt-4 pr-4">
                    <button 
                        @click="isOpen = false"
                        class="textg-gray-400 hover:text-gray-500"
                        >
                        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <svg class="h-6 w-6 text-red" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                            <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">{{  $title  }}</h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">{{  $description  }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                    <button wire:click="{{  $wireClick  }}" type="button" class="inline-flex w-full justify-center rounded-md bg-blue px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-hover sm:ml-3 sm:w-auto">
                        {{  $confirmButtonText  }}
                    </button>
                    <button 
                        @click="isOpen = false" 
                        type="button" 
                        class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset sm:mt-0 sm:w-auto"
                        >
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>