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
    protected $guard = 'admin';
    protected $redirectTo = "{{url('/admin')}}";
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showAdminLoginForm()
    {
        return view('auth.Adminlogin');
    }

    public function guard()
    {
        return auth()->guard('admin');
    }

    public function showRegisterPage()
    {
        return view('auth.register');
    }

      public function showAdminRegisterPage(Request $request)
    {
        $pass = $request->input('pass');
        $password = 1;
        if($pass == $pass){ 
        //if($pass == 'qwertyuiop'){
            return view('auth.AdminRegister'); 
        }else{
            return back();
        }
       
    }
    
     public function registerAdmin(Request $request)
     {
        $email = $request->input('email');
        $name = $request->input('name');
        $password = $request->input('password');

         Admin::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
        ]);

         return view('auth.login')->with('status','Silahkan Login Sebagai Admin');
     }

          public function registerUser(Request $request)
     {
        $email = $request->input('email');
        $name = $request->input('name');
        $password = $request->input('password');
        $no_identity = $request->input('no_identity');
        $no_telepon = $request->input('no_telepon');
        $address = $request->input('address');
               
        $pass = DB::select(DB::raw("SELECT * FROM users"));
        compact('pass');
        foreach ($pass as $pass) {
            if($pass->email == $email){
                return back()->with('status','maaf! email sudah ada');
            }else if ($pass->no_identity == $no_identity) {
                return back()->with('status','maaf! NIM/no.KTP sudah ada');
            }
            else{

             User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'no_identity'=>$no_identity,
            'no_telepon'=>$no_telepon,
            'address' => $address,
        ]);
         return view('auth.login')->with('status','Silahkan Login Sebagai User');
            }
        }
     }

    public function loginAdmin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        if (auth()->guard('admin')->attempt(['email' => $email, 'password' => $password ])) {
            return redirect('/admin');
        }
        return back()->with('error','email atau Password yang anda masukan Salah !!!,
            Silahkan Masukan lagi');
    }

    public function logout(Request $request) {
    Auth::logout();
    return redirect('/');
}

}