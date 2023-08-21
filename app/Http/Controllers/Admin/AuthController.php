<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{        
    /**
     * Get page dashoard
     *
     * @return void
     */
    public function dashboard()
    {
        return view('admin.dashboard.index');
    }
    
    /**
     * Get view login
     *
     * @return void
     */
    public function login()
    {
        return view('admin.login');
    }
    
    /**
     * Action login
     *
     * @param  mixed $request
     * @return void
     */
    public function loginProcess(Request $request)
    {
        if ($request->has('email') && $request->has('password')) {
            $data = [
                'email' => $request->email,
                'password' => $request->password,
            ];

            if (Auth::attempt($data)) {
                return redirect()->route('admin.product.index');
            }

            return back()->withErrors('Wrong account or password, please login again!');
        }
    }

    /**
     * Action logout admin
     *
     * @return void
     */
    public function logout()
    { 
        Auth::logout();   

        return redirect()->route('admin.login');
    }
}
