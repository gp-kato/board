<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    const PASSWORD = 'adminPassword';

    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            if ($request->input('admin_password') === self::PASSWORD) {
                Session::put('admin_login', true);
                return redirect()->route('admin');
            } else {
                return back()->withErrors(['ログインに失敗しました。']);
            }
        }

        return view('login');
    }

    public function logout()
    {
        Session::forget('admin_login');
        return redirect()->route('login');
    }
}

?>
