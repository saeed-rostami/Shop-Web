<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Controllers\Api\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Category $category)
    {
        $categories = Category::query()->whereNull('parent_id')->orderByDesc('views')->get();
        return view('Main.index', compact('categories'));
    }

    function fetch_data(Request $request, Category $category)
    {
        $posts = $category->childs()->paginate(6);
        return View::make('Partials._postsPagination')->with('posts', $posts)->render();
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
//        dd($category->childs()->get());
        $posts = $category->childs()->paginate(6);
        if (!count($posts)) {
            return abort(403, 'در حال حاضر محتوایی برای این بخش وجود ندارد');
        }
        return view('Main.Posts', compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
