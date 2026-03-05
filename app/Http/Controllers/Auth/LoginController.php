<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        $user = DB::table('users')->where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Sai email hoặc mật khẩu');
        }

        session(['user' => $user]);
        //chuyển trang admin
        if ($user->is_admin == 1) {
        return redirect()->route('admin.dashboard');
        }
        // 👉 CHUYỂN TRANG ĐÚNG SERVER
        return redirect('/');
    }

    public function logout()
    {
        session()->forget('user');
        return redirect()->route('login');
    }
}
