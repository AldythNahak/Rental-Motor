<?php
namespace App\Http\Controllers\Auth;
use App\Admin;
use App\User;
use DB;
use Auth;
use Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
class AdminLoginController extends Controller
{
    use AuthenticatesUsers;
    protected $guard = 'user';
    protected $redirectTo = "{{url('User.indexUser')}}";
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function guard()
    {
        return auth()->guard('user');
    }
    

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        if (auth()->guard('user')->attempt(['email' => $email, 'password' => $password ])) {
            return redirect('/');
        }
        return back()->with('error','email atau Password yang anda masukan Salah !!!,
            Silahkan Masukan lagi');
    }

}