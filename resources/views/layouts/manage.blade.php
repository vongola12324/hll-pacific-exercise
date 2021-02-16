@extends('layouts.app')

@section('content')
    <nav id="header" class="bg-gray-900 fixed w-full z-10 top-0 shadow">
        <div class="w-full container mx-auto flex flex-wrap items-center mt-0 pt-3 pb-3 md:pb-0">

            <div class="w-1/2 pl-2 md:pl-0">
                <a class="text-gray-100 text-base xl:text-xl no-underline hover:no-underline font-bold" href="{{ route('manage.dashboard') }}">
                    HLL Pacific Exercise Admin Panel
                </a>
            </div>
            <div class="w-1/2 pr-0">
                <div class="flex relative inline-block float-right">
                    <div class="relative text-sm text-gray-100">
                        <button id="userButton" class="flex items-center focus:outline-none mr-3">
                            <img class="w-8 h-8 rounded-full mr-4" src="{{ Avatar::create($user->name)->toBase64() }}" alt="Avatar of User">
                            <span class="hidden md:inline-block text-gray-100">Hi, {{ $user->name }}</span>
                            <svg class="pl-2 h-2 fill-current text-gray-100" version="1.1"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 129 129">
                                <g>
                                    <path
                                        d="m121.3,34.6c-1.6-1.6-4.2-1.6-5.8,0l-51,51.1-51.1-51.1c-1.6-1.6-4.2-1.6-5.8,0-1.6,1.6-1.6,4.2 0,5.8l53.9,53.9c0.8,0.8 1.8,1.2 2.9,1.2 1,0 2.1-0.4 2.9-1.2l53.9-53.9c1.7-1.6 1.7-4.2 0.1-5.8z"/>
                                </g>
                            </svg>
                        </button>
                        <div id="userMenu"
                             class="bg-gray-900 rounded shadow-md mt-2 absolute mt-12 top-0 right-0 min-w-full overflow-auto z-30 invisible">
                            <ul class="list-reset">
                                <li>
                                    <a href="{{ route('manage.profile.password') }}" class="px-4 py-2 w-full text-left block text-gray-100 hover:bg-gray-800 no-underline hover:no-underline">
                                        Change Password
                                    </a>
                                </li>
                                <li>
                                    <hr class="border-t mx-2 border-gray-400">
                                </li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST" class="inline">
                                        <button class="px-4 py-2 w-full text-left  block text-gray-100 hover:bg-gray-800 no-underline hover:no-underline" type="submit">
                                            Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>


                    <div class="block lg:hidden pr-4">
                        <button id="nav-toggle"
                                class="flex items-center px-3 py-2 border rounded text-gray-500 border-gray-600 hover:text-gray-100 hover:border-teal-500 appearance-none focus:outline-none">
                            <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <title>Menu</title>
                                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
                            </svg>
                        </button>
                    </div>
                </div>

            </div>


            <div
                class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 bg-gray-900 z-20"
                id="nav-content">
                <ul class="list-reset lg:flex flex-1 items-center px-4 md:px-0">
                    <li class="mr-3 my-2 md:my-0">
                        <a href="{{ route('manage.user.index') }}"
                           class="block py-1 md:py-3 px-1 align-middle no-underline hover:text-gray-100 border-b-2 {{ Str::contains(url()->current(), '/user') ? 'border-blue-400 text-blue-400' : 'border-gray-900 text-gray-500' }} hover:border-purple-400">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 inline">
                                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                            </svg>
                            <span class="pb-1 md:pb-0 text-sm">Users</span>
                        </a>
                    </li>
                    <li class="mr-3 my-2 md:my-0">
                        <a href="{{ route('manage.map.index') }}"
                           class="block py-1 md:py-3 px-1 align-middle no-underline hover:text-gray-100 border-b-2 {{ Str::contains(url()->current(), '/map') ? 'border-blue-400 text-blue-400' : 'border-gray-900 text-gray-500' }} hover:border-purple-400">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 inline">
                                <path fill-rule="evenodd" d="M12 1.586l-4 4v12.828l4-4V1.586zM3.707 3.293A1 1 0 002 4v10a1 1 0 00.293.707L6 18.414V5.586L3.707 3.293zM17.707 5.293L14 1.586v12.828l2.293 2.293A1 1 0 0018 16V6a1 1 0 00-.293-.707z" clip-rule="evenodd" />
                            </svg>
                            <span class="pb-1 md:pb-0 text-sm">Maps</span>
                        </a>
                    </li>
                    <li class="mr-3 my-2 md:my-0">
                        <a href="{{ route('manage.battle.index') }}"
                           class="block py-1 md:py-3 px-1 align-middle no-underline hover:text-gray-100 border-b-2 {{ Str::contains(url()->current(), '/battle') ? 'border-blue-400 text-blue-400' : 'border-gray-900 text-gray-500' }} hover:border-purple-400">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 inline">
                                <path fill-rule="evenodd" d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z" clip-rule="evenodd" />
                            </svg>
                            <span class="pb-1 md:pb-0 text-sm">Battles</span>
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>

    <!--Container-->
    <div class="container w-full mx-auto pt-20">

        <div class="w-full px-4 md:px-0 md:mt-8 mb-16 text-gray-800 leading-normal">
            <!--Console Content-->
            @yield('console')
            <!--/ Console Content-->
        </div>


    </div>
    <!--/container-->

    <footer class="bg-gray-900 border-t border-gray-400 shadow fixed bottom-0 w-full">
        <div class="w-full">
            <p class="py-4 text-center text-white text-sm">Copyright &copy; 2021 Vongola, AoMaple</p>
        </div>
    </footer>
@endsection

@push('css')
    <style>
        .bg-black-alt {
            background: #191919;
        }

        .text-black-alt {
            color: #191919;
        }

        .border-black-alt {
            border-color: #191919;
        }

    </style>
@endpush

@push('js')
    <script>
        /*Toggle dropdown list*/
        /*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/
        const userMenuDiv = document.getElementById("userMenu");
        const userMenu = document.getElementById("userButton");
        const navMenuDiv = document.getElementById("nav-content");
        const navMenu = document.getElementById("nav-toggle");

        document.onclick = check;

        function check(e) {
            const target = (e && e.target);

            //User Menu
            if (!checkParent(target, userMenuDiv)) {
                // click NOT on the menu
                if (checkParent(target, userMenu)) {
                    // click on the link
                    if (userMenuDiv.classList.contains("invisible")) {
                        userMenuDiv.classList.remove("invisible");
                    } else {
                        userMenuDiv.classList.add("invisible");
                    }
                } else {
                    // click both outside link and outside menu, hide menu
                    userMenuDiv.classList.add("invisible");
                }
            }

            //Nav Menu
            if (!checkParent(target, navMenuDiv)) {
                // click NOT on the menu
                if (checkParent(target, navMenu)) {
                    // click on the link
                    if (navMenuDiv.classList.contains("hidden")) {
                        navMenuDiv.classList.remove("hidden");
                    } else {
                        navMenuDiv.classList.add("hidden");
                    }
                } else {
                    // click both outside link and outside menu, hide menu
                    navMenuDiv.classList.add("hidden");
                }
            }
        }

        function checkParent(t, elm) {
            while (t.parentNode) {
                if (t === elm) {
                    return true;
                }
                t = t.parentNode;
            }
            return false;
        }
        (function (){
            document.body.classList.add(...['bg-black-alt', 'font-sans', 'leading-normal', 'tracking-normal']);
        })();
    </script>
@endpush
