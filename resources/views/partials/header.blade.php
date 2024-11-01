@if (Session::has('admin_user_id'))
    <div class="py-2 flex items-center justify-center bg-red-600">

        <a href="{{ route('stop-impersonating') }}" class="mx-4 flex space-x-2 items-center ml-10 text-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="text-white">
                <path
                    d="M2 12a5 5 0 0 0 5 5 8 8 0 0 1 5 2 8 8 0 0 1 5-2 5 5 0 0 0 5-5V7h-5a8 8 0 0 0-5 2 8 8 0 0 0-5-2H2Z"></path>
                <path d="M6 11c1.5 0 3 .5 3 2-2 0-3 0-3-2Z"></path>
                <path d="M18 11c-1.5 0-3 .5-3 2 2 0 3 0 3-2Z"></path>
            </svg>
            <span>Stop impersonating</span>
        </a>
    </div>
@endif
<section class="relative w-full px-8 text-stone-700 bg-white body-font">
    <div class="container flex flex-col items-center justify-between py-5 mx-auto md:flex-row max-w-7xl px-4">
        <a href="{{ route('home') }}"
           class="relative z-10 flex items-center w-auto text-nowrap text-2xl font-bold leading-none text-black select-none">
            {{ env('APP_NAME') }}
        </a>
        <nav
            class="flex items-center justify-center w-full h-full py-5  space-x-5 text-base">
            <a href="{{ route('home') }}"
               class="relative font-medium leading-6 text-stone-600 transition duration-150 ease-out hover:text-stone-900"
               x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false">
                <span class="block">Home</span>
                <span class="absolute bottom-0 left-0 inline-block w-full h-0.5 -mb-1 overflow-hidden">
                    <span x-show="hover" class="absolute inset-0 inline-block w-full h-1 h-full transform bg-gray-900"
                          x-transition:enter="transition ease duration-200" x-transition:enter-start="scale-0"
                          x-transition:enter-end="scale-100" x-transition:leave="transition ease-out duration-300"
                          x-transition:leave-start="scale-100" x-transition:leave-end="scale-0"></span>
                </span>
            </a>
            <a href="{{ route('home') }}"
               class="relative font-medium leading-6 text-stone-600 transition duration-150 ease-out hover:text-stone-900"
               x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false">
                <span class="block">Features</span>
                <span class="absolute bottom-0 left-0 inline-block w-full h-0.5 -mb-1 overflow-hidden">
                    <span x-show="hover" class="absolute inset-0 inline-block w-full h-1 h-full transform bg-gray-900"
                          x-transition:enter="transition ease duration-200" x-transition:enter-start="scale-0"
                          x-transition:enter-end="scale-100" x-transition:leave="transition ease-out duration-300"
                          x-transition:leave-start="scale-100" x-transition:leave-end="scale-0"></span>
                </span>
            </a>
            <a href="{{ route('home') }}"
               class="relative font-medium leading-6 text-stone-600 transition duration-150 ease-out hover:text-stone-900"
               x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false">
                <span class="block">Pricing</span>
                <span class="absolute bottom-0 left-0 inline-block w-full h-0.5 -mb-1 overflow-hidden">
                    <span x-show="hover" class="absolute inset-0 inline-block w-full h-1 h-full transform bg-gray-900"
                          x-transition:enter="transition ease duration-200" x-transition:enter-start="scale-0"
                          x-transition:enter-end="scale-100" x-transition:leave="transition ease-out duration-300"
                          x-transition:leave-start="scale-100" x-transition:leave-end="scale-0"></span>
                </span>
            </a>
        </nav>

        <div class="relative z-10 inline-flex items-center space-x-3">
            <div class="space-x-4 flex items-center flex-grow">
                @if (Route::has('login'))
                    @auth
                        @if (!auth()->user()->subscribed())
                            <a wire:navigate.hover href="{{ route('subscriptions.plans') }}"
                               class="inline-flex text-nowrap items-center space-x-2 justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-primary-600 border border-primary-700 rounded-md shadow-sm hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="size-5"><path d="M11.562 3.266a.5.5 0 0 1 .876 0L15.39 8.87a1 1 0 0 0 1.516.294L21.183 5.5a.5.5 0 0 1 .798.519l-2.834 10.246a1 1 0 0 1-.956.734H5.81a1 1 0 0 1-.957-.734L2.02 6.02a.5.5 0 0 1 .798-.519l4.276 3.664a1 1 0 0 0 1.516-.294z"/><path d="M5 21h14"/></svg>

                                <span>{{ __('Upgrade') }}</span>
                            </a>
                        @endif
                        <a wire:navigate.hover href="{{ route('account.subscriptions') }}"
                           class="inline-flex text-nowrap items-center space-x-2 justify-center px-4 py-2 text-base font-medium leading-6 text-stone-600 whitespace-no-wrap bg-white border border-gray-200 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:shadow-none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-round size-5"><circle cx="12" cy="8" r="5"/><path d="M20 21a8 8 0 0 0-16 0"/></svg>
                            <span>{{ __('My Account') }}</span>
                        </a>
                        @can('access dashboard')
                            <a href="{{ route('admin.dashboard') }}"
                               class="inline-flex text-nowrap items-center justify-center space-x-2 px-4 py-2 text-base font-medium leading-6 text-stone-600 whitespace-no-wrap bg-white border border-gray-200 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:shadow-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield size-5"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/></svg>
                                <span>{{ __('Admin') }}</span>
                            </a>
                        @endcan
                        <a
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="inline-flex text-nowrap items-center space-x-2 justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-primary-600 border border-primary-700 rounded-md shadow-sm hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-out size-5"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" x2="9" y1="12" y2="12"/></svg>
                            <span>Log out</span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                               class="inline-flex text-nowrap items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-primary-600 border border-primary-700 rounded-md shadow-sm hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                                {{ __('Get Started') }}
                            </a>
                        @endif
                            <a href="{{ route('login') }}"
                               class="inline-flex space-x-2 text-nowrap items-center justify-center px-4 py-2 text-base font-medium leading-6 text-stone-600 whitespace-no-wrap bg-white border border-gray-200 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:shadow-none">
                                <span>
                                    {{ __('Log in') }}
                                </span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-lock"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            </a>
                    @endauth
                @endif
            </div>

        </div>
    </div>
</section>

<section class="bg-white py-10 flex-1">
    <main class="container mx-auto max-w-7xl px-4">
