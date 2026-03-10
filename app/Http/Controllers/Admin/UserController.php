<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = DB::table('users')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.users.index', compact('users'));
    }

    public function toggleAdmin($id)
    {
        $user = DB::table('users')->where('id', $id)->first();

        DB::table('users')->where('id', $id)->update([
            'is_admin' => $user->is_admin ? 0 : 1
        ]);

        return back();
    }
}
<<<<<<< HEAD
//app/Http/Controllers/Admin/UserController.php
=======
>>>>>>> 7ef827f9323d0c027daa86036c9cb8f1342a4fd6
