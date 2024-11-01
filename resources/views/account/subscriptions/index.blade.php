@extends('layouts.frontend')
@section('title', 'Subscription')

@section('content')
    @include('components.dashboard.subscription-nav')
    <x-container>
        <x-h2>
            Subscription overview
        </x-h2>
        <p>
            Here's a summary of your subscription.
        </p>
        @if (auth()->user()->subscribed())
            @if ($subscription)
                <ul class="list-disc pl-5">
                    <li>
                        {{ auth()->user()->plan->title }}
                        ({{ $subscription->amount() }}/{{ $subscription->interval() }}) - <a wire:navigate.hover href="{{ route('account.subscriptions.swap') }}">Change</a>
                    </li>
                    {{--                        @if (auth()->user()->subscription()->cancelled())--}}
                    {{--                            <li>--}}
                    {{--                                Ends at {{ $subscription->cancelAt() }}--}}
                    {{--                                <a href="{{ route('account.subscriptions.resume') }}" class="underline">Resume--}}
                    {{--                                    subscription</a>--}}
                    {{--                            </li>--}}
                    {{--                        @endif--}}

                    @if ($invoice)
                        <li>Next Payment {{ $invoice->amount() }} on {{ $invoice->nextPaymentAttempt() }}</li>
                    @endif

                    @if ($customer)
                        <li>Balance {{ $customer->balance() }}</li>
                    @endif

                </ul>
            @endif

            <div class="mt-5">
                Use the menu above, or
                <a href="{{ auth()->user()->billingPortalUrl(route('account.subscriptions')) }}" class="underline">

                    go to the Billing Portal at Stripe

                </a>
                to handle your subscription.
            </div>
        @else
            <div>
                <p>You don't have a subscription. </p>
                <a href="{{ route('subscriptions.plans') }}">
                    <x-button>

                        <span>Go check out our available plans</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right">
                            <path d="M5 12h14"/>
                            <path d="m12 5 7 7-7 7"/>
                        </svg>
                    </x-button>
                </a>
            </div>
        @endif
    </x-container>
@endsection
