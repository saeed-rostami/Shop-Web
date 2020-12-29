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
            return redirect()->back()->with('cardExist', 'محصول مورد نظر در سبد خرید شما موجود میباشد');
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
        return redirect()->back()->with('CardSuccess', 'محصول مورد نظر با موفقیت به سبد خرید اضافه شد');
    }

    public function CardIndex()
    {
        return view('Main.Card');
    }


    public function remove($id)
    {
        Cart::remove($id);
        return redirect()->back()->with('CardSuccess', 'محصول مورد نظر از سبد خرید حذف شد');
    }

    public function removeAll()
    {
        Cart::destroy();
        return redirect()->back()->with('CardSuccess', 'سبد خرید شما خالی شد');
    }
}
