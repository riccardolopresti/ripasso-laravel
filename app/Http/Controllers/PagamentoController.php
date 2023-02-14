<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Braintree\Gateway;

class PagamentoController extends Controller
{
    public function create()
    {

        $gateway = new Gateway([
            'environment' => env('BRAINTREE_ENVIRONMENT'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY')
        ]);


        $token = $gateway->ClientToken()->generate();

        return view('admin.pagamento', compact('token'));
    }

    public function store(Request $request)
    {
        //dd($request->all());

        $gateway = new Gateway([
            'environment' => env('BRAINTREE_ENVIRONMENT'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY')
        ]);

        //$nonce = $request->payment_method_nonce;

        $result = $gateway->transaction()->sale([
            'amount' => $request->amount,
            'paymentMethodNonce' => 'fake-valid-nonce',
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {
            // pagamento completato
            dd('completato');
        } else {
            // errore nel pagamento
            dd('errore');
        }
    }
}
