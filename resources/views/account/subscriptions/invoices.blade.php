@extends('layouts.frontend')
@section('title', 'Invoices')

@section('content')
    @include('components.dashboard.subscription-nav')
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200 prose max-w-none">
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
