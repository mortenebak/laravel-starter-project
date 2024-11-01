@extends('layouts.frontend')
@section('title', 'Apply Coupon')

@section('content')
    @include('components.dashboard.subscription-nav')
    <x-container>
        <x-h2>
            Apply a Coupon
        </x-h2>
        <p>
            Received a coupon?
            You can apply a coupon to your subscription to get a discount.
        </p>
        <form action="{{ route('account.subscriptions.coupon.post') }}" method="post">
            @csrf

            <div class="mb-5">
                <x-label for="coupon">{{ __('Coupon') }}</x-label>
                <x-input id="coupon" name="coupon" type="text" :value="old('coupon')" autofocus
                         placeholder="{{ __('Coupon') }}"/>
                @if ($errors->first('coupon'))
                    <p class="text-red-500 text-xs italic mt-4">{{ $errors->first('coupon') }}</p>
                @endif
            </div>

            <x-button type="submit" id="card-button">
                Apply Coupon
            </x-button>


        </form>
    </x-container>
@endsection
