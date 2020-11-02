<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostCollection;
use App\Http\Resources\CategoryCollection;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request, Category $category)
    {
        $posts = new CategoryCollection($category->posts()->paginate(9));
        $counts = $category->posts()->count();

        if ($request->json()) {
            if (!count($posts)) {
                return response()->json('در حال حاضر محتوایی برای این بخش وجود ندارد');
            }
            return response()->json([
                'posts' => $posts,
                'counts' => $counts,
                'status' => 201
            ]);

        }
    }
}
