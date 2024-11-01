@props([
    'plan' => null,
])
<div class="flex flex-col rounded-xl shadow-lg overflow-hidden">
    <div class="px-6 py-8 bg-white sm:p-10 sm:pb-6">
        <div>
            <h3 class="inline-flex px-4 py-1 rounded-full text-sm font-semibold tracking-wide uppercase bg-indigo-100 text-indigo-600" id="tier-Single">
                Monthly
            </h3>
        </div>
        <div class="mt-4 flex items-baseline text-6xl font-extrabold">
            <span class="">$4</span>
        </div>
        <div class="mt-1 text-sm text-gray-600">
            Per Month
        </div>
        <p class="mt-5 text-lg text-gray-500">
            Quisquam incidunt ut laborum laboriosam. Quia, ut. Officiis et placeat autem.
        </p>
    </div>
    <div class="flex-1 flex flex-col justify-between px-6 pt-6 pb-8 bg-gray-50 space-y-6 sm:p-10 sm:pt-6">
        <ul role="list" class="space-y-4">
            @foreach($plan->featuresList as $feature)
                <li class="flex items-start">
                    <div class="flex-shrink-0">
                        @if($feature['included'])
                            <x-icon.check/>
                        @else
                            <x-icon.cross/>
                        @endif
                    </div>
                    <p class="ml-3 text-base text-gray-700">{{ $feature['name'] }}</p>
                </li>
            @endforeach
        </ul>
        <div class="rounded-md shadow">
            <a href="{{ route('subscriptions', ['plan' => $plan->slug]) }}"
               class="flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-emerald-700 hover:bg-emerald-800" aria-describedby="tier-Single">
                {{ __('plans.signup_for') }} {{ $plan->title }}
            </a>
        </div>
    </div>
</div>
