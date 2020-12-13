<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dasbor';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string|min:4',
        ]);
        $login = [
            'email' => strtolower($request->email),
            'password' => $request->password
        ];
        //LAKUKAN LOGIN
        if (auth()->attempt($login)) {
            return redirect()->route('front.dasbor');
        }
        //JIKA SALAH, MAKA KEMBALI KE LOGIN DAN TAMPILKAN NOTIFIKASI
        return redirect()->back()->with(['error' => 'Kredensial salah']);
    }
}
