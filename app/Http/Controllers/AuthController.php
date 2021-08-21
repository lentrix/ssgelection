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

        $token = Str::random(15);

        $user->update([
            'access_token'=>$token,
            'email' => $request->email,
        ]);

        return view('emails.verification', ['user'=>$user]);

        Mail::send('emails.verification',['user'=>$user], function($mail) use ($user) {
            $mail->to($user->email);
            $mail->from('ssg@mdc.ph', "MDC SSG");
            $mail->subject('SSG Election Voter Verification');
        });

        return redirect('/')->with('Info','Your verification link has been sent to your email address. Please open your email and click on the verification link to continue with the verification process.');
    }

    public function verifyEmail($token) {
        $user = User::where('access_token', $token)->first();
        return view('pages.verification-final', compact('user'));
    }

    public function verificationFinal(Request $request) {
        $request->validate([
            'password'=>'string|required|confirmed',
        ]);

        $user = User::find($request->id);

        $user->password = bcrypt($request->password);
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

        $login = auth()->attempt([
            'idnum' => $request->idnum,
            'password' => $request->password
        ]);

        if($login) {
            return redirect('/');
        }else {
            return back()->with('Error','Invalid user credentials!');
        }
    }
}
