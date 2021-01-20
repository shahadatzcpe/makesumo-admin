<?php

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Models\AccessibleItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Cashier\PaymentMethod;


class SubscriptionController extends Controller {

    public function subscriptionIntent() {
        $user = Auth::user();

        $defaultPaymentMethod = optional($user->defaultPaymentMethod());

        return  [
            'intent' => $user->createSetupIntent(),
            'cards' => $user->paymentMethods()->transform(function($item) use ($defaultPaymentMethod){
                return [
                    'id' => $item->id,
                    'card' => [
                        'brand' => $item->card->brand,
                        'last4' => $item->card->last4,
                        'exp_month' => $item->card->exp_month,
                        'exp_year' => $item->card->exp_year,
                    ],
                    'is_default' => $defaultPaymentMethod->id == $item->id
                ];
            }),
            'defaultPaymentMethod' => $defaultPaymentMethod->id
        ];
    }


    public function processSubscription(Request $request)
    {
        $user = Auth::user();
        $paymentMethod = $request->input('paymentMethodId');

        $user->createOrGetStripeCustomer();
        $user->addPaymentMethod($paymentMethod);
        $plan = $request->input('productPriceId');

        $payment = $user->newSubscription('primary', $plan)->create($paymentMethod, [
            'email' => $user->email
        ]);


        // If payment success and customer is purchasing a set
        // or a single item make it accessible
        // by this user.
        if($payment && $plan == config('makesumo.subscription_models.asset_set_price_onetime')) {
            $others = $request->input('others');
            $accessiableItem = new AccessibleItem();
            $accessiableItem->description = "Purchase for commercial use.";
            $accessiableItem->accessiable_id = $others['id'];
            $accessiableItem->accessiable_type = $others['type'];
            $accessiableItem->accessiable_by = Auth::id();
            $accessiableItem->programmatic_description = json_encode([
                array_merge($others, [
                    'plan' => $plan, 'payment' => $payment->id, 'paymentMethod' => $paymentMethod

                ])
            ], JSON_PRETTY_PRINT);
            $accessiableItem->save();
        }

        return back();
    }

    public function updateDefaultPaymentMethod(Request  $request) {
        $request->validate(['payment_method' => 'required']);
        $paymentMethod = \request()->payment_method;
        Auth::user()->updateDefaultPaymentMethod($paymentMethod);
    }

    public function deletePaymentMethod(Request  $request)
    {
        $request->validate(['payment_method' => 'required']);
        $paymentMethod = Auth::user()->findPaymentMethod($request->payment_method);
        $paymentMethod->delete();
    }
}
