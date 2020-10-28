<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
  
class LoginController extends Controller
{
  
    use AuthenticatesUsers;
    
    protected $redirectTo = '/home';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
  
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function login(Request $request)
    {
        $user = \App\User::where([
            'username' => $request->username,
            'password' => md5($request->password)
        ])->first();

        if ($user) 
        {
            $this->guard()->login($user);
            $relink = session(['link' => url()->previous()]);
            if(!isset($relink)){
                return redirect(session('link'));
            }else{
                return redirect('/home');
            }
        }
        return redirect()->route('login');
    }
}
