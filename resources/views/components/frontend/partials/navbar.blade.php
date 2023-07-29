<nav class="w-full h-18 bg-white border-b border-gray-100 sticky top-0 ">
    <x-frontend.partials.container class="flex items-center h-full justify-between w-full max-w-7xl mx-auto">
        <a href="{{ url('/') }}">
            <x-frontend.partials.application-logo/>
        </a>
        <div>
            @auth
                <div
                    x-data="usePopper({placement:'bottom-start',offset:4})"
                    @click.outside="if(isShowPopper) isShowPopper = false"
                    class="inline-flex"
                >
                    <button
                        class="btn space-x-2  font-medium text-slate-800   dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
                        x-ref="popperRef"
                        @click="isShowPopper = !isShowPopper"
                    >
                        <span>{{ Auth::user()->name }}</span>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 transition-transform duration-200"
                            :class="isShowPopper && 'rotate-180'"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M19 9l-7 7-7-7"
                            />
                        </svg>
                    </button>
                    <div x-ref="popperRoot" class="popper-root" :class="isShowPopper && 'show'">
                        <div
                            class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700">
                            <ul>

                                <li>
                                    <x-frontend.partials.dropdown-link :href="route('front.register')">
                                        sfsf
                                    </x-frontend.partials.dropdown-link>
                                </li>
                            </ul>
                            <div class="my-1 h-px bg-slate-150 dark:bg-navy-500"></div>
                            <ul>
                                <li>
                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('front.logout') }}">
                                        @csrf
                                        <x-frontend.partials.dropdown-link :href="route('front.logout')"
                                                                           onclick="event.preventDefault();
                                                                                   this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-frontend.partials.dropdown-link>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @else
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <x-frontend.partials.nav-link :href="route('front.register')">
                        {{ __('navbar.register') }}
                    </x-frontend.partials.nav-link>

                    <x-frontend.partials.nav-link :href="route('front.login')">
                        {{ __('navbar.login') }}
                    </x-frontend.partials.nav-link>
                </div>
            @endauth
        </div>
    </x-frontend.partials.container>
</nav>




