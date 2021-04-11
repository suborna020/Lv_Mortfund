<?php
namespace App\Http\Controllers;
use App\Mail\SubscriberMail;
use App\Mail\UserPassConfirm;
use App\Mail\UserPassToken;
use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use function PHPUnit\Framework\isTrue;
class FPController extends Controller
{
    //------------------------------RESET PASSWORD--------------------------------------//
    //----------------------------------------------------------------------------------//
    public function tokenRequest(Request $request){
        $validated = $request->validate([
            'email' => 'required|email:rfc,dns',
        ]);
        if (isTrue($validated)){
            $user = User::where('email','=',$request->email)->first();
            if ($user){
                $token = $this->generateToken();
                session(['token'=>$token]);
                $email = $request->email;
                Mail::to($email)->send(new UserPassToken($token,$user));
                return view('ui.pages.users.account.token_verify',compact('token','email'));
            }
            else{
                return redirect()->back()->with('error_messege', 'No user exists regarding this email');
            }
        }
        else{
            return redirect()->back()->with('error_messege', 'This is not valid email');
        }
    }
    public function generateToken(){
        $token = Str::random(6);
        return $token;
    }
    public function tokenCheck(Request $request){
        $validated = $request->validate([
            'token' => 'required|max:6',
        ]);
        if ((isTrue($validated))){
            if ($request->token == session('token') or $request->sent_token == $request->token){
                $email = $request->email;
                Session::put('email',$email);
                return redirect('reset-password');
            }
            else{
                return back()->with('error_messege', 'This token is not correct');
            }
        }
        else{
            return back()->with('error_messege', 'This is not valid token');
        }
    }
    public function createNewPassword(Request $request){
        $validated = $request->validate([
            'new_password' => 'required|min:4',
            'confirm_password' => 'required|min:4',
        ]);
        if ((isTrue($validated))){
            $user = User::where('email',$request->email)->first();
            if ($request->new_password == $request->confirm_password){
                User::where('email',$request->email)->update([
                    'password' => $request->new_password
                ]);
                session()->forget('token');
                session()->forget('email');
                Mail::to($request->email)->send(new UserPassConfirm($user));
                return view('ui.pages.users.account.login');
            }
            else{
                return back()->with('error_messege', 'Both password doesn\'t match');
            }
        }
        else{
            return back()->with('error_messege', 'Password is not valid');
        }
    }
}