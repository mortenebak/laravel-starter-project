@extends('layouts.frontend')
@section('content')
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 bg-white border-b border-gray-200">
        <h1 class="text-3xl font-bold mb-5">Available Subscriptions Plans</h1>
        <h2 class="text-xl font-bold">Select a plan to continue</h2>
        @forelse ($plans as $plan)
            <div>
                <a href="{{ route('subscriptions', ['plan' => $plan->slug]) }}">{{ $plan->title }}</a>
            </div>
        @empty

        @endforelse
    </div>
</div>
@endsection
