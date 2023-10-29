<section id="dashboard-nav" class="bg-white overflow-hidden mb-5 shadow-sm sm:rounded-lg">
    <div class="max-w-7xl mx-auto px-6">
        <nav class="flex h-14 items-center space-x-4">

            <div class="flex h-full items-center space-x-4 ">

                <a wire:navigate.hover href="{{ route('account.subscriptions') }}"
                   class="border-b-2 @if (request()->routeIs('account.subscriptions')) border-b-indigo-600 text-indigo-600 @else border-b-transparent @endif
                       hover:border-b-indigo-600 flex items-center h-full hover:text-indigo-600 font-medium"
                >
                    {{ __('Overview') }}
                </a>

                @if (auth()->user()->subscribed())


                    <a wire:navigate.hover href="{{ route('account.subscriptions.swap') }}"
                       class="border-b-2 @if (request()->routeIs('account.subscriptions.swap')) border-b-indigo-600 text-indigo-600 @else border-b-transparent @endif
                           hover:border-b-indigo-600 flex items-center h-full hover:text-indigo-600 font-medium"
                    >
                        {{ __('Change Subscription Plan') }}
                    </a>
                    <a wire:navigate.hover href="{{ route('account.subscriptions.card') }}"
                       class="border-b-2 @if (request()->routeIs('account.subscriptions.card')) border-b-indigo-600 text-indigo-600 @else border-b-transparent @endif
                           hover:border-b-indigo-600 flex items-center h-full hover:text-indigo-600 font-medium"
                    >
                        {{ __('Update Card') }}
                    </a>
                    <a wire:navigate.hover href="{{ route('account.subscriptions.coupon') }}"
                       class="border-b-2 @if (request()->routeIs('account.subscriptions.coupon')) border-b-indigo-600 text-indigo-600 @else border-b-transparent @endif
                           hover:border-b-indigo-600 flex items-center h-full hover:text-indigo-600 font-medium"
                    >
                        {{ __('Apply coupon') }}
                    </a>

                    @can('cancel', auth()->user()->subscription())
                        <a wire:navigate.hover href="{{ route('account.subscriptions.cancel') }}"
                           class="border-b-2 @if (request()->routeIs('account.subscriptions.cancel')) border-b-indigo-600 text-indigo-600 @else border-b-transparent @endif
                               hover:border-b-indigo-600 flex items-center h-full hover:text-indigo-600 font-medium"
                        >
                            {{ __('Cancel Subscription') }}
                        </a>
                    @endcan

                    @can('resume', auth()->user()->subscription())
                        <a wire:navigate.hover href="{{ route('account.subscriptions.resume') }}"
                           class="border-b-2 @if (request()->routeIs('account.subscriptions.resume')) border-b-indigo-600 text-indigo-600 @else border-b-transparent @endif
                               hover:border-b-indigo-600 flex items-center h-full hover:text-indigo-600 font-medium"
                        >
                            {{ __('Resume Subscription') }}
                        </a>
                    @endcan
                @endif

                <a wire:navigate.hover href="{{ route('account.subscriptions.invoices') }}
                    "
                   class="border-b-2 @if (request()->routeIs('account.subscriptions.invoices')) border-b-indigo-600 text-indigo-600 @else border-b-transparent @endif
                       hover:border-b-indigo-600 flex items-center h-full hover:text-indigo-600 font-medium"
                >
                    {{ __('Invoices') }}
                </a>

            </div>
        </nav>
    </div>
</section>
