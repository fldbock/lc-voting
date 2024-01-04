<div>
    <!-- Comments Container -->
    @if ($comments->count())
        <div class="comments-container relative space-y-6 md:ml-22 my-8">
            @foreach ($comments as $comment)
                <livewire:idea-comment 
                    :key="$comment->id"
                    :comment="$comment" 
                />
            @endforeach
        </div>

    <!-- No comments -->
    @else
        <div class="mx-auto w-70 mt-12">
            <img src="{{  asset('img/no-ideas.svg')  }}" alt="No comments" class="mx-auto mix-blend-luminosity data-test-no-comments-svg">
            <div class="text-gray-400 text-center font-bold mt-6">
                No comments were found...
            </div>
        </div>  
    @endif
</div>