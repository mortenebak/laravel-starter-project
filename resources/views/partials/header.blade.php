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
<section class="relative w-full px-8 text-neutral-700 bg-white body-font">
    <div class="container  mx-auto bg-gradient-to-r from-primary-200 via-primary-50 to-primary-200  my-2 rounded-xl p-2 flex gap-2 items-center justify-between">
        <div class="text-sm text-primary-800">
            Alpha version - expect bugs and incomplete features.
        </div>
        <div class="flex-1"></div>
        @can('access dashboard')
            <a href="{{ route('admin.dashboard') }}"
               class="inline-flex text-nowrap items-center justify-center space-x-2 px-2 py-1.5 text-sm font-medium leading-6 text-neutral-600 whitespace-no-wrap bg-white border border-gray-200 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:shadow-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield size-5">
                    <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/>
                </svg>
                <span>{{ __('Admin') }}</span>
            </a>
        @endcan
        @if (Route::has('login'))
            @auth

                <a
                    href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="inline-flex text-nowrap items-center space-x-2 justify-center px-2 py-1.5 text-sm font-medium leading-6 text-white whitespace-no-wrap bg-primary-600 border border-primary-700 rounded-md shadow-sm hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-out size-5">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                        <polyline points="16 17 21 12 16 7"/>
                        <line x1="21" x2="9" y1="12" y2="12"/>
                    </svg>
                    <span>Log out</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                       class="inline-flex text-nowrap items-center justify-center px-2 py-1.5 text-sm font-medium leading-6 text-white whitespace-no-wrap bg-primary-600 border border-primary-700 rounded-md shadow-sm hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                        {{ __('Get Started') }}
                    </a>
                @endif
                <a href="{{ route('login') }}"
                   class="inline-flex space-x-2 text-nowrap items-center justify-center px-2 py-1.5 text-sm font-medium leading-6 text-neutral-600 whitespace-no-wrap bg-white border border-gray-200 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:shadow-none">
                                <span>
                                    {{ __('Log in') }}
                                </span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-lock">
                        <rect width="18" height="11" x="3" y="11" rx="2" ry="2"/>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                    </svg>
                </a>
            @endauth
        @endif
    </div>
    <div class="container flex flex-col items-center justify-between py-5 mx-auto md:flex-row gap-2 px-4">
        <div class="w-[250px] flex-shrink-0">
            <a href="{{ route('home') }}"
               class="relative z-10 flex items-center w-auto text-nowrap text-2xl font-bold leading-none text-black select-none">
                {{ config('app.name') }}
            </a>
        </div>
        <nav
            class="flex items-center justify-center w-full h-full py-5  space-x-5 text-base">
            <x-nav.item href="{{ route('home') }}">
                Home
            </x-nav.item>
            <x-nav.item href="{{ route('features') }}">
                Features
            </x-nav.item>
            <x-nav.item href="{{ route('pricing') }}">
                Pricing
            </x-nav.item>
        </nav>
        <div class="w-[250px] flex items-center gap-2">
            @auth
                <a wire:navigate.hover href="{{ route('account.subscriptions') }}"
                   class="inline-flex text-nowrap items-center space-x-2 justify-center px-2 py-1.5 text-sm font-medium leading-6 text-neutral-600 whitespace-no-wrap bg-white border border-gray-200 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:shadow-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-round size-5">
                        <circle cx="12" cy="8" r="5"/>
                        <path d="M20 21a8 8 0 0 0-16 0"/>
                    </svg>
                    <span>{{ __('My Account') }}</span>
                </a>

                @if (!auth()->user()->subscribed())
                    <a wire:navigate.hover href="{{ route('subscriptions.plans') }}"
                       class="inline-flex text-nowrap items-center space-x-2 justify-center px-2 py-1.5 text-sm font-medium leading-6 text-white whitespace-no-wrap bg-primary-600 border border-primary-700 rounded-md shadow-sm hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="size-5">
                            <path
                                d="M11.562 3.266a.5.5 0 0 1 .876 0L15.39 8.87a1 1 0 0 0 1.516.294L21.183 5.5a.5.5 0 0 1 .798.519l-2.834 10.246a1 1 0 0 1-.956.734H5.81a1 1 0 0 1-.957-.734L2.02 6.02a.5.5 0 0 1 .798-.519l4.276 3.664a1 1 0 0 0 1.516-.294z"/>
                            <path d="M5 21h14"/>
                        </svg>
                        <span>{{ __('Upgrade') }}</span>
                    </a>
                @endif
            @endauth
        </div>
    </div>
</section>

<section class="bg-white flex-1">
    <main class="container mx-auto  px-4">
