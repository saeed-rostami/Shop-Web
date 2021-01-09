<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::query()->where('title', 'like', "%$query%")
            ->orWhere('description', 'like', "%$query%")
            ->paginate(10);
        return view('Main.SearchResult')->with('products', $products);
    }
}
