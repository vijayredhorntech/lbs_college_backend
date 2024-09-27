@props([
    'align' => 'right'
])

<div class="relative inline-flex" x-data="{ open: false }">
    <button
        class="inline-flex justify-center items-center group"
        aria-haspopup="true"
        @click.prevent="open = !open"
        :aria-expanded="open"
    >
        <img class="w-8 h-8 rounded-full" src="{{ Auth::user()->profile_photo_url }}" width="32" height="32"
             alt="{{ Auth::user()->name }}"/>
        <div class="flex items-center truncate">
            <span class="truncate ml-2 text-sm font-semibold text-primaryDark">{{ Auth::user()->name }}</span>
               <i class="fa fa-chevron-down ml-2 text-primaryDark"></i>
        </div>
    </button>
    <div
        class="origin-top-right z-10 absolute top-full min-w-44 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 py-1.5 rounded shadow-lg overflow-hidden mt-1 {{$align === 'right' ? 'right-0' : 'left-0'}}"
        @click.outside="open = false"
        @keydown.escape.window="open = false"
        x-show="open"
        x-transition:enter="transition ease-out duration-200 transform"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-out duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        x-cloak
    >
        <div class="pt-0.5 pb-2 px-3 mb-1 border-b border-slate-200 dark:border-slate-700">
            <div class="font-semibold text-primaryDark">{{ Auth::user()->name }}</div>
            <div class="text-xs text-primaryDark/70 italic">Administrator</div>
            <div class="text-xs text-primaryDark italic flex flex-col">
                <span class="font-bold">
                    Last Login:
                </span>
                <span>
                {{ Auth::user()->lastLoginAt()?->format('M d, Y h:i A') }}
                </span>
            </div>
        </div>
        <ul>
{{--            <li>--}}
{{--                <a class="font-medium text-sm text-indigo-500 hover:text-indigo-600 dark:hover:text-indigo-400 flex items-center py-1 px-3"--}}
{{--                   href="{{ route('profile.show') }}" @click="open = false" @focus="open = true"--}}
{{--                   @focusout="open = false">Settings</a>--}}
{{--            </li>--}}
            <li>
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <a class="font-semibold text-sm text-primaryDark/80 hover:text-primaryDark flex items-center py-1 px-3"
                       href="{{ route('logout') }}"
                       @click.prevent="$root.submit();"
                       @focus="open = true"
                       @focusout="open = false"
                    >
                        {{ __('Sign Out') }}
                    </a>
                </form>
            </li>
        </ul>
    </div>
</div>
