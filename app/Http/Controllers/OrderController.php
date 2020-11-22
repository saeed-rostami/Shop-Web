<?php

namespace App\Http\Controllers;

use App\Product;
use App\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;
use Shetabit\Multipay\Drivers;
use Shetabit\Multipay\Drivers\Zarinpal;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function buy(Request $request)
    {
        $amount = (int)(Cart::total());
        $invoice = (new Invoice)->amount($amount);
        $invoice->via("zarinpal");
        $invoice->getDriver();
        $invoice->transactionId(1);
        $invoice->detail(['email' => 'saeed']);
        $transactionId = $invoice->getTransactionId();

//        dd($invoice->$transactionId);

        return Payment::callbackUrl(route('checkout' ,[$transactionId, $amount]))->purchase(
            (new Invoice)->amount($amount),
            function ($driver, $transactionId) use ($amount) {
                Session::put('transactionId', $transactionId);
                Session::put('amount', $amount);
            }
        )->pay();


//        $content = Cart::content();
//        $order = new Order();
//        $order->user_id = Auth::user()->id;
//        $order->total = Cart::total();
//        $order->status = 0;
//        $order->save();
//
//        if ($order->save()) {
//            foreach ($content as $item) {
//                $product = Product::query()->find($item->id);
//                $order->products()->attach($product->id);
//            }
//        }
//        Cart::destroy();
//        return redirect()->back()->with('success', 'پرداخت با موفقیت انجام شد');
    }

    public function zarinpalCallback1($transactionId, $amount)
    {
        try {
            $transactionId = Session::get($transactionId);
            $amount = (int)Session::get($amount);

            $receipt = Payment::amount($amount)->transactionId($transactionId)->verify();

            // You can show payment referenceId to the user.
            dd($receipt);
            echo $receipt->getReferenceId();


            // correct payment
            $this->zarinpal_place_order(); //for store order information in database
            return Redirect::to('/orders'); // after storing order information in database it redirects to user orders data page


        } catch (InvalidPaymentException $exception) {

            echo $exception->getMessage();


            return Redirect::to('/viewcart'); //in unsuccessful payment it redirects to cart

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
