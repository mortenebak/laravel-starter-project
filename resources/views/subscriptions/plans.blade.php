@extends('layouts.frontend')
@section('content')
    <x-container>
        <x-h2>Available Subscriptions Plans</x-h2>
        <x-h3>Select a plan to continue</x-h3>

        <div class="max-w-md mx-auto space-y-4 lg:max-w-5xl lg:grid lg:grid-cols-2 lg:gap-10 lg:space-y-0">
            @foreach($plans as $plan)
                <x-plans.card :plan="$plan" />
            @endforeach
        </div>
    </x-container>
@endsection
