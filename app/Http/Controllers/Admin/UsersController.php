<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
//users
    public function users()
    {
        $users = User::query()->orderByDesc('created_at')->paginate('50');
        return view('Admin.Views.AdminUsers', compact('users'));
    }

//    edit

    public function edit(User $user)
    {
        return view('Admin.Partials._EditUser', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'family' => $request->family,
            'email' => $request->email,
            'phone' => $request->phone,
            'email_verified_at' => $request->email_verified_at,
        ]);
        $user->save();

        return redirect()->back()->with('success', 'تغییرات با موفقیت اعمال شدند');
    }

//destroy

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'کاربر با موفقیت حذف شد');

    }
}

