<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
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
    // protected $redirectTo = 'adm/manajemen-wisata';
    function login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ],[
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email harus berformat email yang valid',
            'password.required' => 'Password wajib diisi',
        ]);
    
        $credentials = $request->only('email', 'password');
    
        if(Auth::attempt($credentials)){
            if(Auth::user()->role == 'pengunjung'){
                return redirect('/pengunjung');
            } elseif (Auth::user()->role == 'adminwisata'){
                return redirect('adm/manajemen-wisata');
            } else if (Auth::user()->role == 'superadmin'){
                return redirect('superadm/manajemen-wisata');
            }
        }else {
            return redirect()->back()->withErrors(['email' => 'Username atau password yang dimasukkan tidak sesuai.'])->withInput($request->only('email'));
        }
    }
    
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    
}
