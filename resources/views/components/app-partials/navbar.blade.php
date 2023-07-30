<nav class="w-full h-18 bg-white border-b  border-slate-100  shadow-sm z-50 sticky top-0 ">
    <x-app-partials.container class="flex  items-center h-full justify-between ">
        <a href="{{ url('/') }}">
            <x-app-partials.application-logo/>
        </a>
        <div>
            @auth
                <div
                    x-data="usePopper({placement:'bottom-start',offset:4})"
                    @click.outside="if(isShowPopper) isShowPopper = false"
                    class="inline-flex"
                >
                    <button
                        class="inline-flex space-x-2 justify-between items-center  font-medium text-slate-800   dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
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
                                    <x-app-partials.dropdown-link :href="route('front.register')">
                                        sfsf
                                    </x-app-partials.dropdown-link>
                                </li>
                            </ul>
                            <div class="my-1 h-px bg-slate-150 dark:bg-navy-500"></div>
                            <ul>
                                <li>
                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('front.logout') }}">
                                        @csrf
                                        <x-app-partials.dropdown-link :href="route('front.logout')"
                                                                      onclick="event.preventDefault();
                                                                                   this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-app-partials.dropdown-link>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @else
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <x-app-partials.nav-link :href="route('front.register')">
                        {{ __('navbar.register') }}
                    </x-app-partials.nav-link>

                    <x-app-partials.nav-link :href="route('front.login')">
                        {{ __('navbar.login') }}
                    </x-app-partials.nav-link>
                </div>
            @endauth
        </div>
    </x-app-partials.container>
</nav>




