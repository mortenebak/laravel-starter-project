@extends('layouts.frontend')
@section('title', 'Subscription')

@section('content')
    @include('components.dashboard.subscription-nav')
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200 prose max-w-none">
            <h2>
                Subscription overview
            </h2>
            <p>
                Here's a summary of your subscription.
            </p>
            @if (auth()->user()->subscribed())
                @if ($subscription)
                    <ul class="list-disc pl-5">
                        <li>
                            {{ auth()->user()->plan->title }}
                            ({{ $subscription->amount() }}/{{ $subscription->interval() }})  - <a wire:navigate.hover href="{{ route('account.subscriptions.swap') }}">Change</a>
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
                            Go check out our available plans
                        </x-button>
                    </a>
                </div>

            @endif


        </div>
    </div>
@endsection
