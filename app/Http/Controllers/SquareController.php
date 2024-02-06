<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Square\SquareClient;
use Square\Environment;
use Ramsey\Uuid\Uuid;
use Square\Models\Money;
use Square\Models\CreatePaymentRequest;
use Square\Exceptions\ApiException;

class SquareController extends Controller
{
    public function __construct()
    {
        $access_token = env('SQUARE_ACCESS_TOKEN');

        $this->square_client = new SquareClient([
            'accessToken' => $access_token,
            'environment' => env('ENVIRONMENT')
        ]);
        $location            = $this->square_client->getLocationsApi()->retrieveLocation(env('SQUARE_LOCATION_ID'))->getResult()->getLocation();
        $this->location_id   = $location->getId();

        $this->currency = $location->getCurrency();
        $this->country  = $location->getCountry();
    }

    public function getPayment(Request $request)
    {
        $data = [
            'currency'           => $this->currency,
            'country'            => $this->country,
            'location_id'        => $this->location_id,
            'square_location_id' => env('SQUARE_LOCATION_ID'),
            'square_app_id'      => env('SQUARE_APPLICATION_ID'),
            'square_environment' => env('ENVIRONMENT'),
            'uuid4'              => Uuid::uuid4(),
            'js_cdn'             => env('ENVIRONMENT') === Environment::PRODUCTION ? "https://web.squarecdn.com/v1/square.js" : "https://sandbox.web.squarecdn.com/v1/square.js"
        ];
        return view('square_payment', $data);
    }

    public function postPayment(Request $request)
    {
        $token          = $request->token;
        $idempotencyKey = $request->idempotencyKey;

        $square_client = new SquareClient([
            'accessToken'     => env('SQUARE_ACCESS_TOKEN'),
            'environment'     => env('ENVIRONMENT'),
            'userAgentDetail' => 'sample_app_php_payment', // Remove or replace this detail when building your own app
        ]);

        $payments_api = $square_client->getPaymentsApi();

        // To learn more about splitting payments with additional recipients,
        // see the Payments API documentation on our [developer site]
        // (https://developer.squareup.com/docs/payments-api/overview).

        $money = new Money();
        // Monetary amounts are specified in the smallest unit of the applicable currency.
        // This amount is in cents. It's also hard-coded for $1.00, which isn't very useful.
        $money->setAmount(150);
        // Set currency to the currency for the location
        $money->setCurrency($this->currency);

        try {
            // Every payment you process with the SDK must have a unique idempotency key.
            // If you're unsure whether a particular payment succeeded, you can reattempt
            // it with the same idempotency key without worrying about double charging
            // the buyer.
            $create_payment_request = new CreatePaymentRequest($token, $idempotencyKey);
            $create_payment_request->setLocationId($this->location_id);
            $create_payment_request->setAmountMoney($money);

            $response = $payments_api->createPayment($create_payment_request);
            dd($response->getResult());
            if ($response->isSuccess()) {
                return response()->json(['success' => $response->getResult()]);
            } else {
                return response()->json(['errors' => $response->getErrors()]);
            }
        } catch (ApiException $e) {
            return response()->json(['errors' => $e]);
        }
    }
}
