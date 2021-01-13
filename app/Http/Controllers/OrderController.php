<?php

namespace App\Http\Controllers;

use App\Http\Helpers;
use App\Http\Requests\OrderRequest;
use App\Order;
use App\Product;
use App\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
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
    public function buy(OrderRequest $request)
    {
        $amount = Cart::subtotal();
        $price = Helpers\amount($amount);
        $results = Zarinpal::request(
            url(route('callback')),
            $price,
            'laravel'
        );
        if (isset($results['Authority']) && !empty($results['Authority'])) {
            Order::create([
                'refID' => null,
                'authority' => $results['Authority'],
                'address' => $request->address,
                'user_id' => auth()->user()->id,
                'total' => $price,
                'status' => 0,
            ]);

//            $items = Cart::content();
//            foreach ($items as $item) {
//                $order->products()->attach($item->id);
//            }

            Zarinpal::redirect();
        } else {
            return redirect()->back()->with('fail', [
                'title' => 'ناموفق',
                'message' => 'مشکل در برقراری ارتباط با درگاه رخ داده است لطفا بعدا تلاش فرمایید',
                'button' => 'متوجه شدم'
            ]);
        }
    }

    public function callback()
    {

        $authority = \request('Authority');
        $order = Order::query()->firstWhere('authority', $authority);
        if (!$order || !$authority) {
            return redirect()->back()->with('fail', [
                'title' => 'ناموفق',
                'message' => 'خطایی رخ داده است یا اطلاعات نادرست است',
                'button' => 'متوجه شدم'
            ]);
        }
        $verified_request = Zarinpal::verify('ok', $order->total, $authority);

        if ($verified_request['Status'] === 'success') {
            $order->update([
                'status' => true,
                'refID' => $verified_request['RefID'],
            ]);
            $items = Cart::content();
            foreach ($items as $item) {
                $order->products()->attach($item->id);
                auth()->user()->products()->attach($item->id);
            }
            $order->save();
            Cart::destroy();
            session()->flash('successBuy', [
                'title' => 'خرید با موفقیت انجام شد...',
                'message' => 'با تشکر از خرید شما',
                'button' => 'بستن'
            ]);

            return redirect('/');
        } else {

            return redirect('/')->with('fail', [
                'title' => 'ناموفق',
                'message' => 'خطایی رخ داده است لطفا بعدا تلاش فرمایید',
                'button' => 'متوجه شدم'
            ]);

        }
    }
}
