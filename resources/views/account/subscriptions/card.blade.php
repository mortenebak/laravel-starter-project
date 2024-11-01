@extends('layouts.frontend')
@section('title', 'Update card details')

@section('content')
    @include('components.dashboard.subscription-nav')
    <x-container>
        <x-h2>
            Update Creditcard Details
        </x-h2>
        <p>
            Got a new card? Update your card details here.
        </p>
        <x-card-form :action="route('account.subscriptions.card.post')">
            <x-button type="submit" id="card-button" data-secret="{{ $intent->client_secret }}">
                Update card details
            </x-button>
        </x-card-form>
    </x-container>
@endsection
