<?php

namespace App\Http\Controllers;

use App\Models\AuthloginModel;
use Hash;
use Illuminate\Http\Request;
use Session;

class AuthloginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function registration()
    {
        return view('auth.registration');
    }
    public function registeruser(Request $request)
    {
        // for validation

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:authlogin_models',
            'password' => 'required',
        ]);

        $user = new AuthloginModel();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $res = $user->save();
        if ($res) {
            return redirect('login')->with('success', 'You Have Registerd successfully');
        } else {
            return back()->with('fail', 'Something Wrong');
        }
    }

    public function loginuser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = AuthloginModel::where('email', '=', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->Session()->put('loginId', $user->id);
                return redirect('dashboard');
            } else {
                return back()->with('fail', 'Password does not match');
            }
        } else {
            return back()->with('fail', 'this email is not registerd');
        }
    }

    public function dashboard()
    {
        $data = array();
        if (Session::has('loginId')) {
            $data = AuthloginModel::where('id', '=', Session::get('loginId'))->first();
        }
        return view('auth.dashboard', compact('data'));
    }

    public function logout()
    {
        if (Session::has('loginId')) {
            Session::pull('loginId');
            return redirect('login')->with('success', 'Now you are loggedout');
        }
    }
}
