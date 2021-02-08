<nav
    class="navbar navbar-expand-md bg-blue-500 shadow-sm text-gray-800"
>
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <div class="sm:ml-2 overflow-hidden bg-white px-2">
                <img class="h-14 w-20 object-cover flex-shrink-0 rounded" src="{{asset('/images/logo-final.png')}}" alt="" />
            </div>
        </a>
        <div
            class="navbar-toggler text-white outline-none focus:shadow-outline active:shadow-outline focus:bg-blue-100"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="{{ __('Toggle navigation') }}"
        >
            <svg
                fill="none"
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                viewBox="0 0 24 24"
                class="w-8 h-8"
            >
                <path d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul
                class="navbar-nav mr-auto text-base flex justify-around ml-auto text-white"
            >
                <li>
                    <a
                        href="{{route('articles')}}"
                        class="no-underline hover:no-underline sm:ml-6 text-lg sm:text-xl hover:undeline text-white tracking-wide"
                        >Habari</a
                    >
                </li>
                <li>
                    <a
                        href="{{route('stories')}}"
                        class="no-underline hover:no-underline sm:ml-6 text-lg sm:text-xl hover:undeline text-white tracking-wide"
                        >Hadithi</a
                    >
                </li>
                <li>
                    <a
                        href="{{route('poems')}}"
                        class="no-underline hover:no-underline sm:ml-6 text-lg sm:text-xl hover:undeline text-white tracking-wide"
                        >Mashairi</a
                    >
                </li>
                <li>
                    <a
                        href="{{route('quotes')}}"
                        class="no-underline hover:no-underline sm:ml-6 text-lg sm:text-xl hover:undeline text-white tracking-wide"
                        >Nasaha</a
                    >
                </li>
                <li>
                    <a
                        href="{{route('reviews')}}"
                        class="no-underline hover:no-underline sm:ml-6 text-lg sm:text-xl hover:undeline text-white tracking-wide"
                        >Makala</a
                    >
                </li>
                <li>
                    <a
                        href="{{route('translate-index')}}"
                        class="no-underline hover:no-underline sm:ml-6 text-lg sm:text-xl hover:undeline text-white tracking-wide underline"
                        >Tafsiri</a
                    >
                </li>
                                {{-- <li>
                    <a
                        href="{{route('tx-works-index')}}"
                        class="no-underline hover:no-underline sm:ml-6 text-lg sm:text-xl hover:undeline text-white tracking-wide"
                        > Kazi Zilotafsiriwa</a
                    >
                </li> --}}
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                <li
                    class="nav-item sm:rounded-full sm:px-3  mr-3 text-white text-lg sm:text-xl hover:undeline"
                >
                    <a class="nav-link sm:hover:text-white hover:no-underline" href="{{ route('login') }}"
                        >{{ __('Ingia') }}</a
                    >
                </li>
                @if (Route::has('register'))
                <li
                    class="nav-item sm:rounded-full sm:px-3 sm:bg-green-400 mr-3 text-white text-lg sm:text-xl hover:undeline focus:text-white"
                >
                    <a class="nav-link" href="{{ route('register') }}"
                        >{{ __('Jisajili') }}</a
                    >
                </li>
                @endif 
                
                @else
                <li
                    class="nav-item dropdown border-0 relative flex-end text-gray-800 text-lg"
                >
                    <a
                        id="navbarDropdown"
                        class="nav-link dropdown-toggle text-white z-50 flex items-center"
                        href="#"
                        role="button"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                        v-pre
                    >
                        <img
                            class="w-8 h-8 sm:w-12 sm:h-12 rounded-full object-cover shadow-m border-2 border-white"
                            src="{{asset('storage' . '/' . Auth::user()->avatar())}}"
                            alt=""
                        />
                        <span class="ml-2">{{auth()->user()->name}}</span>
                    </a>

                    <div
                        class="dropdown-menu dropdown-menu-right w-32 sm:w-auto shadow outline-none border-0 py-2"
                        aria-labelledby="navbarDropdown"
                    >
                        @can('manage_users')
                         <a
                            href="{{route('admin.users.index')}}"
                            class="flex items-center block px-2 py-1 no-underline hover:no-underline hover:bg-blue-400 hover:text-white"
                        >
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-4 h-4 text-sm mr-1"><path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                            Admin Dashboard
                        </a>                        
                        @endcan

                        <a
                            href="{{route('member-profile',auth()->user()->username)}}"
                            class="flex items-center block px-2 py-1 no-underline hover:no-underline hover:bg-blue-400 hover:text-white"
                        >
                            <svg
                                fill="none"
                                stroke="currentColor"z
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                viewBox="0 0 24 24"
                                class="w-4 h-4 text-sm mr-1"
                            >
                                <path
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
                                ></path>
                                <path
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                ></path>
                            </svg>
                            Wasifu Wangu
                        </a>
                        <a
                            class="flex items-center block px-2 py-1 no-underline hover:no-underline hover:bg-blue-400 hover:text-white"
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                        >
                            <svg
                                fill="none"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                viewBox="0 0 24 24"
                                class="w-4 h-4 text-sm mr-1"
                            >
                                <path
                                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"
                                ></path>
                            </svg>
                            {{ __('Toka') }}
                        </a>

                        <form
                            id="logout-form"
                            action="{{ route('logout') }}"
                            method="POST"
                            style="display: none;"
                        >
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
