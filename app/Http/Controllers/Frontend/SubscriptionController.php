<?php

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Stripe\StripeClient;

class SubscriptionController extends Controller {

    public function subscriptionIntent() {
        $plans = config('makesumo.subscription_models');
        $user = Auth::user();
        return  [
            'intent' => $user->createSetupIntent(),
//            'plans' => $plans,
            'cards' => $user->paymentMethods()->transform(function($item) {
                return [
                    'id' => $item->id,
                    'card' => [
                        'brand' => $item->card->brand,
                        'last4' => $item->card->last4,
                        'exp_month' => $item->card->exp_month,
                        'exp_year' => $item->card->exp_year,
                    ]
                ];
            }),
        ];
    }


    public function processSubscription(Request $request)
    {
        $user = Auth::user();
        $paymentMethod = $request->input('paymentMethodId');

        $user->createOrGetStripeCustomer();
        $user->addPaymentMethod($paymentMethod);
        $plan = $request->input('productPriceId');

        $user->newSubscription('primary', $plan)->create($paymentMethod, [
            'email' => $user->email
        ]);


    }
}
