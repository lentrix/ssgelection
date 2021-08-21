<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function verificationForm() {
        return view('pages.verification');
    }

    public function verify(Request $request) {
        $request->validate([
            'idnum' =>'numeric|required',
            'idext' =>'required|string',
            'lname' =>'required|string',
            'fname' =>'required|string',
            'email' =>'required|email',
        ]);

        $user = User::where('idnum', $request->idnum . '-' . $request->idext)->first();

        if(!$user) {
            return back()->with('Error', 'The ID Number you entered is not found.');
        }

        if($user->email_verified_at!=null) {
            $dateStr = $user->email_verified_at->format('M d, Y g:i:s');
            return back()->with('Error',"Account with IDNumber: $user->idnum was already verified on $dateStr. If you are the owner of this account and you did not verify this yourself, please contact any of the SSG officers for account recovery.");
        }

        if($user->lname!==$request->lname) {
            return back()->withInput()->with('Error', 'The last name does not match');
        }
        if($user->fname!==$request->lname) {
            return back()->withInput()->with('Error', 'The first name does not match');
        }

        $token = Str::random(15);

        $user->update([
            'access_token'=>$token,
            'email' => $request->email,
        ]);

        Mail::send('emails.verification',['user'=>$user], function($mail) use ($user) {
            $mail->to($user->email);
            $mail->from('ssg@mdc.ph', "MDC SSG");
            $mail->subject('SSG Election Voter Verification');
        });

        return redirect('/')->with('Info','Your verification link has been sent to your email address. Please open your email and click on the verification link to continue with the verification process.');
    }

    public function verifyEmail($token) {
        $user = User::where('access_token', $token)->first();

        if(!$user) {
            return redirect('/login')->with('Error','Invalid token. The attached token is invalid or has already been consumed.');
        }

        return view('pages.verification-final', compact('user'));
    }

    public function verificationFinal(Request $request) {
        $request->validate([
            'password'=>'string|required|confirmed',
        ]);

        $user = User::find($request->id);

        $user->password = bcrypt($request->password);
        $user->access_token = null;
        $user->email_verified_at = now();
        $user->save();

        auth()->attempt([
            'idnum'=>$user->idnum,
            'password'=>$request->password
        ]);

        return redirect('/')->with('Info', "Welcome $user->fname!");
    }

    public function logout() {
        auth()->logout();
        return redirect('/')->with('Info','You have been logged out!');
    }

    public function loginForm() {
        return view('pages.login');
    }

    public function login(Request $request) {
        $request->validate([
            'idnum'=>'string|required',
            'password'=>'string|required'
        ]);

        $user = User::where('idnum', $request->idnum)->first();

        if(!$user) {
            return back()->with('Error',"The ID Number $request->idnum does not exists.");
        }

        $login = auth()->attempt([
            'idnum' => $request->idnum,
            'password' => $request->password
        ]);

        if($login) {
            return redirect('/');
        }else {
            return back()->withInput()->with('Error','Invalid user credentials!');
        }
    }

    public function forgotForm() {
        return view('pages.forgot');
    }

    public function forgot(Request $request) {
        $request->validate([
            'email' => 'email|required'
        ]);

        $token = Str::random(20);
        $user = User::where('email', $request->email)->first();

        if(!$user) {
            return back()->with('Error', "The email $request->email cannot be found in our records.");
        }

        $user->update(['access_token'=>$token]);

        Mail::send('emails.forgot', ['user'=>$user], function($mail) use ($user){
            $mail->to($user->email);
            $mail->subject('Password Recovery');
            $mail->from('ssg@mdc.ph','MDC SSG');
        });

        return back()->with('Info','A recovery link has been sent to ' . $user->email . '. Please check your email to proceed with the password recovery process.');
    }

    public function passwordRecoveryForm($token) {
        $user = User::where('access_token', $token)->first();

        if(!$user) {
            return redirect('/forgot')->with('Error','The given token is invalid.');
        }

        return view('pages.forgot-password-change', compact('user'));
    }

    public function passwordRecovery(Request $request) {
        $request->validate([
            'password' => 'required|confirmed'
        ]);

        $user = User::findOrFail($request->id);

        $user->password = bcrypt($request->password);
        $user->access_token = null;
        $user->save();

        return redirect('/login')->with('Info','Your password has been updated. You may login now using your new password.');
    }
}
