@extends('layouts.base')

@section('body')

    <div class="md:flex md:flex-col md:h-screen" x-data="{mobileOpen: false}">
        <div class="md:flex md:flex-shrink-0">
            <div class="flex items-center justify-between px-6 py-4 bg-main dark:bg-gray-900 md:flex-shrink-0 md:justify-center md:w-56">
                <a class="mt-1 font-bold text-white dark:text-slate-200 uppercase" href="/">
                    {{ config('app.name') }}
                </a>
                <button type="button" class="md:hidden" x-on:click="mobileOpen = !mobileOpen">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
                    </svg>
                </button>
            </div>
            <div x-transition="" x-show="mobileOpen" class="md:hidden px-5 bg-main dark:bg-gray-900 block" style="display: none;">
                <x-admin-navigation></x-admin-navigation>
            </div>
            <div class="md:text-md flex items-center justify-between p-4 w-full text-sm bg-main-white dark:bg-gray-800 border-b dark:border-b-slate-700 md:px-12 md:py-0">
                <button @click="darkMode = !darkMode" class="dark:text-white">
                    <svg x-cloak x-show="darkMode" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                    </svg>
                    <svg x-cloak x-show="!darkMode" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
                    </svg>

                </button>
                <div x-data="{dropdownMenu: false}" class="relative ml-auto" @click.outside="dropdownMenu = false" @keyup.escape.window="dropdownMenu = false">
                    <button type="button" class="mt-1" @click="dropdownMenu = ! dropdownMenu">
                        <div class="group flex items-center cursor-pointer select-none">
                            <div class="mr-1 text-gray-500 dark:text-slate-200 hover:text-gray-900 group-hover:text-primary focus:text-primary whitespace-nowrap">
                                <span>{{ auth()->user()->name }}</span>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-5 h-5 fill-gray-500 group-hover:fill-gray-900 group-hover:fill-primary focus:fill-primary">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                            </svg>
                        </div>
                    </button>
                    <!-- Dropdown list -->
                    <div x-show="dropdownMenu" x-transition="" class="absolute top-6 right-0 p-2 mt-2 bg-white border border-gray-200 rounded-md overflow-hidden shadow-lg w-44 space-y-2" style="z-index: 51; display: none;">
                        <a wire:navigate href="{{ route('admin.profile.edit') }}" class="flex space-x-2 items-center p-2 text-sm text-gray-500 hover:text-gray-900 hover:bg-secondary hover:text-primary rounded-md transition ease-in-out">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"></path>
                            </svg>
                            <span>Account</span>
                        </a>
                        <a wire:navigate href="/admin/employees/reset-password" class="flex space-x-2 items-center p-2 text-sm text-gray-500 hover:text-gray-900 hover:bg-secondary hover:text-primary rounded-md transition ease-in-out">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span>Set password</span>
                        </a>
                        <hr>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                           class="flex space-x-2 items-center p-2 text-sm text-gray-500 hover:text-gray-900 hover:bg-secondary hover:text-primary rounded-md transition ease-in-out">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75"></path>
                            </svg>
                            <span>Logout</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <div class="md:flex md:flex-grow md:overflow-hidden">
            <div class="hidden flex-shrink-0 p-5 w-56 bg-main dark:bg-gray-900 overflow-y-auto md:block">
                <x-admin-navigation></x-admin-navigation>
            </div>
            <div class="px-4 pt-8 pb-16 md:flex-1 md:px-10 md:overflow-y-auto bg-main-white dark:bg-gray-800 ">

                @yield('content')

                @isset($slot)
                    {{ $slot }}
                @endisset


            </div>
        </div>
    </div>

@endsection
