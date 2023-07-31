<nav class="w-full h-18 bg-white border-b  border-slate-100  shadow-sm z-50 sticky top-0 ">
    <x-app-partials.container class="flex  items-center h-full justify-between ">
        <a href="{{ url('/') }}">
            <x-app-partials.application-logo/>
        </a>
        <div class="flex items-center">
            <div
                x-data="usePopper({placement:'bottom-start',offset:4})"
                @click.outside="if(isShowPopper) isShowPopper = false"
                class="inline-flex ml-2">
                <button
                    x-ref="popperRef"
                    @click="isShowPopper = !isShowPopper"
                    class="avatar h-7 w-7  hover:z-10">

                    <img class="rounded-full ring ring-white dark:ring-navy-700"
                         src="http://127.0.0.1:8000/images/100x100.png" alt="avatar">
                </button>
                {{--                <button--}}
                {{--                    x-ref="popperRef"--}}
                {{--                    @click="isShowPopper = !isShowPopper"--}}
                {{--                    class="btn h-8 w-8 rounded-full p-0 bg-slate-300/20 hover:bg-slate-300/40 focus:bg-slate-300/40 active:bg-slate-300/30 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">--}}
                {{--                    <i class="uil uil-estate icons"></i>--}}
                {{--                </button>--}}
                <div x-ref="popperRoot" class="popper-root" :class="isShowPopper && 'show'">
                    <div
                        class="w-72 popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700">
                        <div class="p-2 flex items-center justify-start space-x-2">
                            <div class="avatar h-7 w-7  hover:z-10">
                                <img class="rounded-full ring ring-white dark:ring-navy-700"
                                     src="http://127.0.0.1:8000/images/100x100.png" alt="avatar">
                            </div>
                            <div>
                                {{ Auth::user()->name }}
                            </div>

                        </div>
                        <ul>
                            <li>
                                <div class="flex px-2">
                                    <x-app-partials.link-button class="w-full mt-2 mb-2" href="{{ route('landing') }}">
                                        Switch to User
                                    </x-app-partials.link-button>
                                </div>
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

        </div>
    </x-app-partials.container>
</nav>




