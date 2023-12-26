<div>
    <!-- Status filters nav -->
    <nav class="hidden md:flex items-center justify-between text-xs text-gray-400">
        <ul class="flex uppercase font-semibold space-x-10 border-b-4 pb-3">
            <li wire:click.prevent="setStatus('All')">
                <a href="{{  route('idea.index', ['status' => 'All'])  }}" class="border-b-4 pb-3 hover:border-blue @if ($status === 'All' && $currentRouteName != 'idea.show'){
                     border-blue text-gray-900
                    } @endif">All Ideas ({{  $statusCount["all_statuses"] }})</a>
            </li>
            <li wire:click.prevent="setStatus('Considering')">
                <a href="{{  route('idea.index', ['status' => 'Considering'])  }}" class="transition duration-150 border-b-4 pb-3 hover:border-blue @if ($status === 'Considering'){
                     border-blue text-gray-900
                    } @endif">Considering ({{  $statusCount["considering"]}})</a>
            </li>
            <li wire:click.prevent="setStatus('In Progress')">
                <a href="{{  route('idea.index', ['status' => 'In Progress'])  }}" class="transition duration-150 border-b-4 pb-3 hover:border-blue @if ($status === 'In Progress'){
                     border-blue text-gray-900
                    } @endif">In Progress ({{  $statusCount["in_progress"]}})</a>
            </li>
        </ul>
        <ul class="flex uppercase font-semibold space-x-10 border-b-4 pb-3">
            <li wire:click.prevent="setStatus('Implemented')">
                <a href="{{  route('idea.index', ['status' => 'Implemented'])  }}" class="transition duration-150 border-b-4 pb-3 hover:border-blue @if ($status === 'Implemented'){
                     border-blue text-gray-900
                    } @endif">Implemented ({{  $statusCount["implemented"]}})</a>
            </li>
            <li wire:click.prevent="setStatus('Closed')">
                <a href="{{  route('idea.index', ['status' => 'Closed'])  }}" class="transition duration-150 border-b-4 pb-3 hover:border-blue @if ($status === 'Closed'){
                     border-blue text-gray-900
                    } @endif">Closed ({{  $statusCount["closed"]}})</a>
            </li>
        </ul>
    </nav>
</div>
