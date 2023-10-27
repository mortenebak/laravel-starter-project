@extends('layouts.frontend')

@section('content')
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <h1 class="text-3xl font-bold mb-5">Complete your subscription purchase</h1>
            <p>Fill out the form below to complete your subscription purchase. If you have a coupon, you can apply it.</p>
            <x-card-form :action="route('subscriptions.store')">
                <input type="hidden" name="plan" value="{{ request('plan') ?? 'pro-monthly' }}">

                <div class="mb-5">
                    <x-label for="coupon">{{ __('Coupon') }}</x-label>
                    <x-input id="coupon" name="coupon" type="text" :value="old('coupon')" autofocus
                             placeholder="{{ __('Coupon') }}"/>
                    @if($errors->first('coupon'))
                        <p class="text-red-500 text-xs italic mt-4">{{ $errors->first('coupon') }}</p>
                    @endif
                </div>

                <x-button type="submit" id="card-button" data-secret="{{ $intent->client_secret }}">
                    Complete Subscription
                </x-button>
            </x-card-form>
        </div>
    </div>
@endsection

