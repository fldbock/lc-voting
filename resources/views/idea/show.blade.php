<x-app-layout>
    <!-- BackUrl -->
    <div>
        <a href="{{  $backUrl  }}" class="flex items-center font-semibold hover:underline">
            <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
            <span class="ml-2"> All ideas (or back to chosen category with filters)</span>
        </a>
    </div> <!-- end going back -->

    <!-- Showing the idea -->
    <livewire:idea-show :idea="$idea" :votesCount="$votesCount" :hasVoted="$hasVoted"/>

    <!-- Comments container -->
    <livewire:idea-comments :idea="$idea"/>
    
    <!-- Modals Container -->
    <x-modals-container :idea="$idea"/>

    <!-- Success Message Notification -->
    <x-notification-success />


</x-app-layout>