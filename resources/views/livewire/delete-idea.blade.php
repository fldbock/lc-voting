<x-modal-confirm 
    event-to-open-modal="open-delete-idea-modal"
    event-to-close-modal="idea-was-deleted"
    title="Delete Idea"
    description="Are you sure you want to delete this idea? This action cannot be undone."
    wire-click="deleteIdea"
    confirm-button-text="Delete"
/>