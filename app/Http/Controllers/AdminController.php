<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use Session;

class AdminController extends Controller
{
    public function index()
    {
        session_start();
        session_unset();
        return view('auth-login');
    }
    public function auth(Request $request)
    {
        $email = $request->post('email');
        $password = $request->post('password');

        $result = Admin::where(['email' => $email, 'password' => $password])->get();
        if (isset($result['0']->id)) {
            $request->session()->put('ADMIN_LOGIN', true);
            $request->session()->put('ADMIN_ID', $result['0']->id);
            return redirect('index');
        } else {
            $request->session()->flash('error', 'Please Enter Valid Login Details');
            return redirect('auth-login');
        }
    }
}
