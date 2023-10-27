@extends('layouts.frontend')
@section('title', 'Resume Subscription')

@section('content')
    @include('components.dashboard.subscription-nav')
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200 prose max-w-none">
            <h2>
                Resume your subscription
            </h2>
            <p>
                We're glad to see you back. You can resume your subscription here.
            </p>
            <form action="{{ route('account.subscriptions.resume.post') }}" method="post">
                @csrf
                <x-button type="submit">Resume Subscription</x-button>
            </form>
        </div>
    </div>
@endsection
