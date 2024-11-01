@extends('layouts.frontend')
@section('title', 'Invoices')

@section('content')
    @include('components.dashboard.subscription-nav')
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-stone-200">
        <div class="p-6 prose max-w-none">
            <h2>
                Invoices
            </h2>
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
        </div>
    </div>
@endsection
