<section id="dashboard-nav" class="bg-white border-b border-t border-gray-200">
    <div class="max-w-7xl mx-auto px-6">
        <nav class="flex justify-between h-14 items-center">
            <div class="flex h-full items-center space-x-4 ">
                <a wire:navigate.hover href="{{ route('dashboard') }}"
                   class="border-b-2 @if(request()->routeIs('dashboard')) border-b-indigo-600 text-indigo-600 @else border-b-transparent @endif
                       hover:border-b-indigo-600 flex items-center h-full hover:text-indigo-600 font-medium"
                >
                    {{ __('Overview') }}
                </a>
                <a wire:navigate.hover href="{{ route('designer.index') }}"
                   class="border-b-2 @if(request()->routeIs('designer.index')) border-b-indigo-600 text-indigo-600 @else border-b-transparent @endif
                       hover:border-b-indigo-600 flex items-center h-full hover:text-indigo-600 font-medium"
                >
                    {{ __('Designer') }}
                </a>
                <a wire:navigate.hover href="{{ route('analytics') }}"
                   class="border-b-2 @if(request()->routeIs('analytics')) border-b-indigo-600 text-indigo-600 @else border-b-transparent @endif
                       hover:border-b-indigo-600 flex items-center h-full hover:text-indigo-600 font-medium"
                >
                    {{ __('Analytics') }}
                </a>
                <a wire:navigate.hover href="{{ route('integrations') }}"
                   class="border-b-2 @if(request()->routeIs('integrations')) border-b-indigo-600 text-indigo-600 @else border-b-transparent @endif
                       hover:border-b-indigo-600 flex items-center h-full hover:text-indigo-600 font-medium"
                >
                    {{ __('Integrations') }}
                </a>
            </div>
            <div class="flex h-full items-center space-x-4 ">

                <a wire:navigate.hover href="{{ route('account') }}"
                   class="border-b-2 @if(request()->routeIs('account')) border-b-indigo-600 text-indigo-600 @else border-b-transparent @endif
                       hover:border-b-indigo-600 flex items-center h-full hover:text-indigo-600 font-medium"
                >
                    {{ __('My Account') }}
                </a>
                <a wire:navigate.hover href="{{ route('settings.edit') }}"
                   class="border-b-2 @if(request()->routeIs('settings.edit')) border-b-indigo-600 text-indigo-600 @else border-b-transparent @endif
                       hover:border-b-indigo-600 flex items-center h-full hover:text-indigo-600 font-medium"
                >
                    {{ __('Settings') }}
                </a>
                <a wire:navigate.hover href="{{ route('account.subscriptions') }}"
                   class="border-b-2 @if(request()->routeIs('account.subscriptions.*') OR request()->routeIs('account.subscriptions')) border-b-indigo-600 text-indigo-600 @else border-b-transparent @endif
                       hover:border-b-indigo-600 flex items-center h-full hover:text-indigo-600 font-medium"
                >
                    {{ __('Subscription') }}
                </a>

                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                   class="border-b-2 border-b-transparent hover:border-b-indigo-600 flex items-center h-full hover:text-indigo-600 font-medium"
                >
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </nav>
    </div>
</section>
