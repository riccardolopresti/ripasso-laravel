@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Pagamento</h1>

        <form id="payment-form" method="post" action="{{ route('admin.pagamento.store') }}">
            @csrf
            <div id="dropin-container"></div>

            <label for="amount">Importo</label>

            <input type="text" class="form-control" name="amount" id="amount" value="10.00">
            <input type="hidden" id="nonce" name="payment_method_nonce" value="fake-valid-nonce"/>

            <button id="submit-button" class="btn btn-primary">Paga adesso</button>

        </form>
    </div>
@endsection

@section('scripts')
    <script>
        var form = document.querySelector('#payment-form');
        var client_token = "{{ $token }}";

        braintree.dropin.create({
            authorization: client_token,
            container: '#dropin-container'
        }, function (createErr, instance) {
            var submitButton = document.querySelector('#submit-button');

            submitButton.addEventListener('click', function () {
                instance.requestPaymentMethod(function (err, payload) {
                    if (err) {
                        console.log('Request Payment Method Error', err);
                        return;
                    }

                    // Aggiungi il nonce alla form e invia il pagamento
                    document.querySelector('#amount').value = payload.nonce;
                    form.submit();
                });
            });
        });
    </script>
@endsection

