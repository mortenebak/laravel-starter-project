<section class="relative w-full px-8 text-gray-700 bg-white body-font">
    <div class="container flex flex-col flex-wrap items-center justify-between py-5 mx-auto md:flex-row max-w-7xl">
        <a href="{{ route('home') }}"
           class="relative z-10 flex items-center w-auto text-2xl font-extrabold leading-none text-black select-none">{{ env('APP_NAME') }}</a>
        <nav
            class="top-0 left-0 z-0 flex items-center justify-center w-full h-full py-5 -ml-0 space-x-5 text-base md:-ml-5 md:py-0 md:absolute">
            <a href="{{ route('home') }}"
               class="relative font-medium leading-6 text-gray-600 transition duration-150 ease-out hover:text-gray-900"
               x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false">
                <span class="block">Home</span>
                <span class="absolute bottom-0 left-0 inline-block w-full h-0.5 -mb-1 overflow-hidden">
                    <span x-show="hover" class="absolute inset-0 inline-block w-full h-1 h-full transform bg-gray-900"
                          x-transition:enter="transition ease duration-200" x-transition:enter-start="scale-0"
                          x-transition:enter-end="scale-100" x-transition:leave="transition ease-out duration-300"
                          x-transition:leave-start="scale-100" x-transition:leave-end="scale-0"></span>
                </span>
            </a>
        </nav>

        <div class="relative z-10 inline-flex items-center space-x-3 md:ml-5 lg:justify-end">

            <div class="space-x-4">
                @if (Route::has('login'))
                    @auth
                        @if(!auth()->user()->subscribed())
                            <a wire:navigate.hover href="{{ route('subscriptions.plans') }}"
                               class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-primary-600 border border-primary-700 rounded-md shadow-sm hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                                {{ __('Upgrade') }}
                            </a>
                        @endif
                        <a wire:navigate.hover href="{{ route('account.subscriptions') }}"
                           class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-gray-600 whitespace-no-wrap bg-white border border-gray-200 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:shadow-none">
                            {{ __('My Account') }}
                        </a>
                        @can('access dashboard')
                        <a href="{{ route('admin.dashboard') }}"
                           class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-gray-600 whitespace-no-wrap bg-white border border-gray-200 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:shadow-none">
                            {{ __('Admin') }}
                        </a>
                        @endcan
                        <a
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-primary-600 border border-primary-700 rounded-md shadow-sm hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500"
                        >
                            Log out
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <a href="{{ route('login') }}"
                           class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-gray-600 whitespace-no-wrap bg-white border border-gray-200 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:shadow-none">Log
                            in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                               class="inline-flex items-center justify-center px-4 py-2 text-base font-medium leading-6 text-white whitespace-no-wrap bg-primary-600 border border-primary-700 rounded-md shadow-sm hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">Register</a>
                        @endif
                    @endauth
                @endif
            </div>

        </div>
    </div>
</section>

<section class="bg-gray-200 py-10 flex-1">
    <main class="container mx-auto max-w-7xl">
