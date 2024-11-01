@extends('layouts.frontend')
@section('title', 'Invoices')

@section('content')
    @include('components.dashboard.subscription-nav')
    <x-container>
        <x-h2>
            Invoices
        </x-h2>
        <p>
            You can download your invoices here.
        </p>
        @forelse ($invoices as $invoice)
            <div class="flex justify-between">
                <div>{{ $invoice->date()->toFormattedDateString() }}</div>
                <div>{{ $invoice->total() }}</div>
                <a href="{{ route('account.subscriptions.invoice', $invoice->id) }}">Download</a>
            </div>
        @empty
            No invoices
        @endforelse
    </x-container>
@endsection
