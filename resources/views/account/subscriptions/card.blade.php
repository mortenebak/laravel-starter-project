@extends('layouts.frontend')
@section('title', 'Update card details')

@section('content')
    @include('components.dashboard.subscription-nav')
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200 prose max-w-none">
            <h2>
                Update Creditcard Details
            </h2>
            <p>
                Got a new card? Update your card details here.
            </p>
            <x-card-form :action="route('account.subscriptions.card.post')">
                <x-button type="submit" id="card-button" data-secret="{{ $intent->client_secret }}">
                    Update card details
                </x-button>
            </x-card-form>
        </div>

    </div>
@endsection
