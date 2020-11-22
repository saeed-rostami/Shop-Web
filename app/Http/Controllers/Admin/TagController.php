<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminTagRequest;
use App\Http\Resources\Product;
use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('Admin.Views.AdminTags', compact('tags'));
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
    public function storeTag(AdminTagRequest $request)
    {
        $tag = new Tag();
        $tag->name = $request->name;
        $tag->save();

        return redirect()->back()->with('success', 'برچسب جدید با موفقیت ثبت شد');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('Admin.Partials._EditTag', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function update(AdminTagRequest $request, Tag $tag)
    {
        $tag->update([
            'name' => $request->name,
        ]);
        $tag->save();
        return redirect()->route('Admin-Tags')->with('success', 'تغییرات با موفقیت اعمال شدند');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function deleteTag(Tag $tag)
    {
        $tag->delete();
        return redirect()->back()->with('success', 'برچسب مورد نظر با موفقیت حذف شد');

    }
}
