<?php

namespace App\Http\Controllers;

use App\Order;
use App\Pay;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Shetabit\Payment\Exceptions\InvalidPaymentException;
use Shetabit\Payment\Facade\Payment;
use Shetabit\Payment\Invoice;
use Zarinpal\Zarinpal;

class PayController extends Controller
{
    public function checkout(Request $request)
    {
        $validator = Validator::make($request->all() ,[
            'price' => ['required', 'numeric'],
            'order_id' => ['required', 'numeric'],
        ]);

        if ($validator->fails())
        {
            return new JsonResponse($validator->errors()->all(), 400);
        }

        # create new invoice
        $price = (int) $request->price;
        $invoice = (new Invoice)->amount($price);
        $code = Order::find(request()->post('order_id'))->code;
        //$invoice->uuid();
        # purchase the given invoice
        return Payment::callbackUrl(route('zarinpal.verify' , [$price , "checkout_{$code}"]))
            ->purchase($invoice, function($driver, $transactionId) {
                // we can store $transactionId in database
                Pay::create([
                    'transaction_id' => $transactionId ,
                    'order_id' => \request()->post('order_id') ,
                    'user_id' => auth()->user()->id
                ]);
            }
            )->pay()->getTargetUrl();
    }

    public function zarinPal_request(Request $request)
    {
        $validator = Validator::make($request->all() ,[
            'price' => ['required', 'numeric'],
        ]);

        if ($validator->fails())
        {
            return new JsonResponse($validator->errors()->all(), 400);
        }


            # create new invoice
            $price = (int) $request->price;
            $invoice = (new Invoice)->amount($price);
            $invoice->uuid();
            # purchase the given invoice
            return Payment::callbackUrl(route('zarinpal.verify' , [$price , 'payment'] ))
                ->purchase($invoice, function($driver, $transactionId) {
                    // we can store $transactionId in database
                    Pay::create([
                        'transaction_id' => $transactionId ,
                        'user_id' => auth()->user()->id ,
                    ]);
                }
                )->pay()->getTargetUrl();
    }

    public function callback($price , $check , Request $request)
    {

        # you need to verify the payment to insure the invoice has been paid successfully
        // we use transaction's id to verify payments
        // its a good practice to add invoice's amount.
        $price = (int) $price;
        $pay = Pay::where('transaction_id' , request()->get('Authority'))->first();
        try {
            Payment::amount($price)->transactionId(\request()->get('Authority'))->verify();
            $pay->update([
                'message' => 'پرداخت با موفقیت انجام شد' ,
                'price' => $price
            ]);
            if (strstr($check, 'checkout' ))
            {
                return redirect()->route('pay' , [$request->get('Status') , 'success' , $request->get('Authority') , $price])
                    ->with(['flash' => $check]);
            }
            else
            {
                return redirect()->route('pay' , [$request->get('Status') , 'success' , $request->get('Authority') , $price])
                    ->with('flash' , 'payment');
            }


        } catch (InvalidPaymentException $exception) {
            /**
            when payment is not verified , it throw an exception.
            we can catch the exception to handle invalid payments.
            getMessage method, returns a suitable message that can be used in user interface.
             **/
            $pay->update([
                'message' => $exception->getMessage() ,
                'price' => $price
            ]);
            //echo $exception->getMessage();
            return redirect()->route('pay' , [$request->get('Status') , $exception->getMessage() , $request->get('Authority') , $price]);
        }
    }

//    public function zarinPal_verify($price)
//    {
//        $zarinpal = new Zarinpal('XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX');
//        $zarinpal->enableSandbox(); // active sandbox mod for test env
//// $zarinpal->isZarinGate(); // active zarinGate mode
//        $results = $zarinpal->request(
//            route('zarinpal.verify' , $price),          //required
//            (int)$price,                                  //required
//            'testing',                             //required
//            'me@example.com',                      //optional
//            '09000000000',                         //optional
//            [                          //optional
//                "Wages" => [
//                    "zp.1.1"=> [
//                "Amount"=> 120,
//                "Description"=> "part 1"
//            ],
//            "zp.2.5"=> [
//        "Amount"=> 60,
//                "Description"=> "part 2"
//            ]
//        ]
//    ]
//);
//echo json_encode($results);
//if (isset($results['Authority'])) {
//    file_put_contents('Authority', $results['Authority']);
//    $zarinpal->redirect();
//}
//    }

}
