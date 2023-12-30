@props([
    'idea'    
])

<div>
    <!-- Edit Idea Modal -->
    @can('update', $idea)
        <livewire:edit-idea :idea="$idea"/>
    @endcan

    <!-- Delete Idea Modal -->
    @can('delete', $idea)
        <livewire:delete-idea  :idea="$idea"/>
    @endcan

    <!-- Mark as Spam Modal -->
    @auth
        <livewire:mark-idea-as-spam  :idea="$idea"/>
    @endauth

    <!-- Mark as Not Spam Modal -->
    @admin
        <livewire:mark-idea-as-not-spam  :idea="$idea"/>
    @endadmin
</div>
