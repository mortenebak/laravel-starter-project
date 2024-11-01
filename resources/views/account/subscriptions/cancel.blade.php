@extends('layouts.frontend')
@section('title', 'Cancel Subscription')

@section('content')
    @include('components.dashboard.subscription-nav')
   <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-stone-200">
       <div class="p-6 prose max-w-none">
           <h2>
                Cancel Subscription
           </h2>
           <p>We're sad to see you go.
You can cancel your subscription at any time. You will still have access to your account until the end of your billing period.
           </p>
           <form action="{{ route('account.subscriptions.cancel.post') }}" method="post">
               @csrf
               <x-button type="submit">Cancel Subscription</x-button>
           </form>
       </div>
   </div>

@endsection
