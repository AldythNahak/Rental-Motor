<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use DB;
use Auth;
use Hash;
use App\Notification;
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
    protected $guard = 'user';

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = "{{url('/User')}}";

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
        $email = $request->input('email');
        $password = $request->input('password');
        if (auth()->guard('user')->attempt(['email' => $email, 'password' => $password ])) {
             $user = DB::table('users')->where('email', '=', $email)->get(); 
            return view('User.indexUser', compact('user'));
        }
        return back()->with('error','email atau Password yang anda masukan Salah !!!,
            Silahkan Masukan lagi');
    }

    public function settingUser(Request $request, $email)
    {
      $user = DB::table('users')->where('email', '=', $email)->get(); 
      return view('User.settingUser',compact('user'));
    }

        public function logout(Request $request) {
        Auth::logout();
        return redirect('/');
    }


    public function bookings(Request $request)
    {   
        $waktu = $request->input('waktu_sewa');
        $email = $request->input('email');
        $dell = DB::select(DB::raw("DELETE FROM notification WHERE email = '$email' AND waktu_sewa = '$waktu'"));
        $pass = DB::select(DB::raw("SELECT * FROM users WHERE email = '$email'"));
        compact('pass');
        compact('dell');
            foreach ($pass as $pass){
                    if($email == $pass->email){
                        Notification::create($request->all());
                        $user = DB::table('users')->where('email', '=', $email)->get(); 
                        return view('User.indexUser', compact('user'));
                    }
                }
    }

        public function HOME(Request $request,$email)
    {
        $pass = DB::select(DB::raw("SELECT * FROM users WHERE email = '$email'"));
        compact('pass');
        foreach ($pass as $pass) {
            if($email == $pass->email){
            $user = DB::table('users')->where('email', '=', $email)->get(); 
            return view('User.indexUser', compact('user'));
            }else{
            return error();
            }
        } 
    }

        public function destroy(Notification $notification, $id, $email)
    {
            $pass = DB::select(DB::raw("SELECT * FROM users WHERE email = '$email'"));
        compact('pass');
        foreach ($pass as $pass) {
            if($email == $pass->email){
            DB::delete('delete from notification where id = ?',[$id]);
            $user = DB::table('users')->where('email', '=', $email)->get();
            return view('User.indexUser', compact('user'));
            }
        }
    }

}
