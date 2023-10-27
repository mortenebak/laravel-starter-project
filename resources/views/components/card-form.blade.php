<form action="{{ $attributes->get('action') }}" method="post" id="card-form" class="mt-5">
    @csrf

    <div class="mb-5">
        <x-label for="card-holder-name">{{ __('Name on Card') }}</x-label>
        <x-input id="card-holder-name" name="name" type="text" :value="old('name')" autofocus
                 placeholder="{{ __('Name on Card') }}"/>
        @if($errors->first('name'))
            <p class="text-red-500 text-xs italic mt-4">{{ $errors->first('name') }}</p>
        @endif
    </div>

    <div class="mb-5">
        <x-label for="name">{{ __('Card details') }}</x-label>
        <div id="card-element"></div>
    </div>

    {{ $slot }}
</form>

<script>
    jQuery(function() {

        const stripe = Stripe(jQuery("meta[name='stripe-key']").attr("content"))
        const elements = stripe.elements();
        const cardElement = elements.create('card');

        cardElement.mount('#card-element');

        const form  = document.getElementById('card-form');
        const cardButton  = document.getElementById('card-button');
        const cardHolderName  = document.getElementById('card-holder-name');

        form.addEventListener('submit', async (e) => {
            e.preventDefault();

            cardButton.disabled = true;

            const { setupIntent, error } = await stripe.confirmCardSetup(
                cardButton.dataset.secret,  {
                    payment_method: {
                        card: cardElement,
                        billing_details: {
                            name: cardHolderName.value,
                        },
                    },
                }
            )

            if(error) {
                console.log(error)
                cardButton.disabled = false;
            } else {
                let token = document.createElement('input');

                token.setAttribute('type', 'hidden');
                token.setAttribute('name', 'token');
                token.setAttribute('value', setupIntent.payment_method);

                form.appendChild(token);

                form.submit();
            }

        });

    });

</script>
