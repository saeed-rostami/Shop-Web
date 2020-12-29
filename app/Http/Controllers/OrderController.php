<?php

namespace App\Http\Controllers;

//use App\Http\Helpers;
use App\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Zarinpal\Laravel\Facade\Zarinpal;
use Hekmatinasser\Verta;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function buy(Request $request)
    {
        $amount = Cart::subtotal();
        $amount = substr($amount, 0, strpos($amount, "."));
        $amount = str_replace(',', '', $amount);
        $amount = (int)$amount;
        $results = Zarinpal::request(
            url(route('callback')),
            $amount,
            'laravel'
        );
        if (isset($results['Authority']) && !empty($results['Authority'])) {
            $order = Order::create([
                'refID' => null,
                'authority' => $results['Authority'],
                'address' => $request->address,
                'user_id' => auth()->user()->id,
                'total' => $amount,
                'status' => 0,
            ]);

            $items = Cart::content();
            foreach ($items as $item) {
                $order->products()->attach($item->id);
            }

            Zarinpal::redirect();
        } else {
            return redirect()->back()->with('success', 'مشکل در برقراری ارتباط با درگاه رخ داده است لطفا بعدا تلاش فرمایید');
        }
    }

    public function callback()
    {

        $authority = \request('Authority');
        $order = Order::query()->firstWhere('authority', $authority);
        if (!$order || !$authority) {
            return redirect()->back()->with('success', 'خطایی رخ داده و یا اطلاعات درست نمیباشد');
        }
        $verified_request = Zarinpal::verify('ok', $order->total, $authority);

        if ($verified_request['Status'] === 'success') {
            $order->update([
                'status' => true,
                'refID' => $verified_request['RefID'],
            ]);
            $order->save();
            Cart::destroy();
            session()->flash('successBuy', [
                'title' => 'خرید با موفقیت انجام شد...',
                'body' => 'با تشکر از خرید شما',
            ]);

            return redirect('/');
        } else {
            return redirect('/')->with('success', 'پرداخت ناموفق و لطفا دوباره تلاش کنید');

        }
    }
}
