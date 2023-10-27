@extends('layouts.frontend')
@section('title', 'Swap Subscription Plan')

@section('content')
    @include('components.dashboard.subscription-nav')
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200 prose max-w-none">
            <h2>
                Upgrade or downgrade your subscription
            </h2>
            <p>
                You can upgrade or downgrade your subscription at any time.
                When downgrading, you will be credited the difference to your next invoice.
                You can swap between monthly and yearly plans.
            </p>
            <form action="{{ route('account.subscriptions.swap.post') }}" method="post">
                @csrf

                <div class="mb-5">
                    <x-label for="plan">{{ __('Plan') }}</x-label>
                    <select name="plan" id="plan"
                            class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @foreach($plans as $plan)
                            <option value="{{ $plan->slug }}">{{ $plan->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-5">
                    <x-button type="submit">Change Plan</x-button>
                </div>

            </form>
        </div>
    </div>
@endsection
