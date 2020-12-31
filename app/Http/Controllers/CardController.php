<?php

namespace App\Http\Controllers;

use App\Card;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class CardController extends Controller
{
    public function AddProduct(Request $request)
    {
        $price = $request->price;
        $price = str_replace(' تومان', '', $price);
        $duplicate = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });
        if ($duplicate->isNotEmpty()) {
            return redirect()->back()->with('cardExist', [
                'title' => 'هشدار',
                'message' => 'محصول مورد نظر در سبد خرید شما موجود است',
                'button' => 'متوجه شدم'
            ]);
        }

        $item = Cart::add([
            'id' => $request->id,
            'name' => $request->title,
            'qty' => 1,
            'price' => $price,
            'options' => [
                'coach' => $request->coach,
                'image' => $request->image,
                'postTitle' => $request->post,
                'catTitle' => $request->cat,
                'slug' => $request->slug,
            ],
        ]);
        return redirect()->back()->with('successBuy', [
            'title' => 'عملیات موفق',
            'message' => 'محصول مورد نظر با موفقیت به سبد خرید اضافه شد',
            'button' => 'بستن'
        ]);
    }

    public function CardIndex()
    {
        return view('Main.Card');
    }


    public function remove($id)
    {
        Cart::remove($id);
        return redirect()->back()->with('successBuy', [
            'title' => 'عملیات موفق',
            'message' => 'محصول مورد نظر با از سبد خرید حذف شد',
            'button' => 'بستن'
        ]);
    }

    public function removeAll()
    {
        Cart::destroy();
        return redirect()->back()->with('emptyBasket', [
            'title' => 'عملیات موفق',
            'message' => 'سبد خرید شما خالی است',
            'button' => 'بستن'
        ]);
    }
}
