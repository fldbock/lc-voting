<div class="px-6 py-4">
    @auth
        <form action="{{  route('logout')  }}" method="post">
            @csrf
            <a 
                href="{{ route('logout') }}"
                onclick="event.preventDefault(); console.log(this.closest('form')); this.closest('form').submit();">

                {{ __('Log out')}}
            </a>
        </form>
    @else
        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline" wire:navigate>Log in</a>

        @if (Route::has('register'))
            <a href="{{ route('register') }}" class="text-sm text-gray-700 underline" wire:navigate>Register</a>
        @endif
    @endauth
</div>
