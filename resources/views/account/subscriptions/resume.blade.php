@extends('layouts.frontend')
@section('title', 'Resume Subscription')

@section('content')
    @include('components.dashboard.subscription-nav')
    <x-container>
        <x-h2>
            Resume your subscription
        </x-h2>
        <p>
            We're glad to see you back. You can resume your subscription here.
        </p>
        <form action="{{ route('account.subscriptions.resume.post') }}" method="post">
            @csrf
            <x-button type="submit">Resume Subscription</x-button>
        </form>
    </x-container>
@endsection
