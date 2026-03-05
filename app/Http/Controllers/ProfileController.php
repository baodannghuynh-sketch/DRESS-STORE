<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {
        $user = DB::table('users')
            ->where('id', session('user_id'))
            ->first();

        return view('profile.index', compact('user'));
    }

    public function update(Request $request)
    {
        DB::table('users')
            ->where('id', session('user_id'))
            ->update([
                'name' => $request->name,
                'updated_at' => now()
            ]);

        return redirect()->back()->with('success', 'Cập nhật thông tin thành công');
    }
}
