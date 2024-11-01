@extends('layouts.frontend')
@section('title', 'Swap Subscription Plan')

@section('content')
    @include('components.dashboard.subscription-nav')
    <x-container>
        <x-h2>
            Upgrade or downgrade your subscription
        </x-h2>
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
                    @foreach ($plans as $plan)
                        <option value="{{ $plan->slug }}">{{ $plan->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-5">
                <x-button type="submit">Change Plan</x-button>
            </div>

        </form>
    </x-container>
@endsection
