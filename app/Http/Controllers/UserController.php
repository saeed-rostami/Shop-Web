<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Order;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('Main.profile', compact('user'));
    }

    public function editProfile()
    {
        $user = Auth::user();
        return view('Main.EditProfile', compact('user'));
    }

    public function storeProfile(Request $request, User $user)
    {
        $user = User::query()->find($request->user()->id);
        $user->update([
           $user->name = $request->name,
           $user->family = $request->family,
           $user->phone = $request->phone,
        ]);
        $user->save();
        return redirect()->back()->with('success', 'تغییرات با موفقیت انجام شد');
    }
}
