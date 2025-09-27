@extends('layouts.frontend')
@section('title', 'Available Subscriptions Plans')
@section('content')
    <x-container class="!border-0 shadow-none">
        <div class="text-center mb-10">
            <x-h1>Available Subscriptions Plans</x-h1>
            <p>
                Choose the plan that best fits your needs.
            </p>
        </div>

        <div class="max-w-md mx-auto space-y-4 lg:max-w-5xl lg:grid lg:grid-cols-2 lg:gap-10 lg:space-y-0">
            @foreach ($plans as $plan)
                <x-plans.card :plan="$plan" />
            @endforeach
        </div>
    </x-container>
@endsection
