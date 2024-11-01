@extends('layouts.frontend')

@section('content')
    <x-container>
        <x-h1>Complete your subscription purchase</x-h1>
        <p>Fill out the form below to complete your subscription purchase. If you have a coupon, you can apply it.</p>
        <x-card-form :action="route('subscriptions.store')">
            <input type="hidden" name="plan" value="{{ request('plan') ?? 'pro-monthly' }}">

            <div class="mb-5">
                <x-label for="coupon">{{ __('Coupon') }}</x-label>
                <x-input id="coupon" name="coupon" type="text" :value="old('coupon')" autofocus
                         placeholder="{{ __('Coupon') }}"/>
                @if ($errors->first('coupon'))
                    <p class="text-red-500 text-xs italic mt-4">{{ $errors->first('coupon') }}</p>
                @endif
            </div>

            <x-button type="submit" id="card-button" data-secret="{{ $intent->client_secret }}">
                Complete Subscription
            </x-button>
        </x-card-form>
    </x-container>
@endsection

