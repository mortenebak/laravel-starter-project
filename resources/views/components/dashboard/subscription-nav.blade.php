<section id="dashboard-nav" class="bg-white overflow-hidden mb-5 shadow-sm sm:rounded-lg border border-stone-200">
    <div class="max-w-7xl mx-auto px-6">
        <nav class="flex h-14 items-center space-x-4">
            <div class="flex h-full items-center space-x-4 ">

                <x-nav.subscription-navitem to_route="account.subscriptions">
                    {{ __('Overview') }}
                </x-nav.subscription-navitem>

                @if (auth()->user()->subscribed())

                    <x-nav.subscription-navitem to_route="account.subscriptions.swap">
                        {{ __('Change Subscription Plan') }}
                    </x-nav.subscription-navitem>

                    <x-nav.subscription-navitem to_route="account.subscriptions.card">
                        {{ __('Update Card') }}
                    </x-nav.subscription-navitem>

                    <x-nav.subscription-navitem to_route="account.subscriptions.coupon">
                        {{ __('Apply Coupon') }}
                    </x-nav.subscription-navitem>

                    @can('cancel', auth()->user()->subscription())
                        <x-nav.subscription-navitem to_route="account.subscriptions.cancel">
                            {{ __('Cancel Subscription') }}
                        </x-nav.subscription-navitem>
                    @endcan

                    @can('resume', auth()->user()->subscription())
                        <x-nav.subscription-navitem to_route="account.subscriptions.resume">
                            {{ __('Resume Subscription') }}
                        </x-nav.subscription-navitem>
                    @endcan
                @endif

                <x-nav.subscription-navitem to_route="account.subscriptions.invoices">
                    {{ __('Invoices') }}
                </x-nav.subscription-navitem>


            </div>
        </nav>
    </div>
</section>
