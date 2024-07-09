<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestEmail;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Login extends Controller
{
    function Register()
    {
        $categories = Category::all();
        return view('Register', compact('categories'));
    }

    function ResetPassword()
    {
        $categories = Category::all();
        return view('ResetPassword', compact('categories'));
    }

    function SetNewPassword($token)
    {
        // Attempt to find the token in the database
        $tokenData = DB::table('password_reset_tokens')
            ->where('token', $token)
            ->first();

        $err = 0;


        if (!$tokenData) {
            // Token not found, redirect or show an error
            $err = 1;
            return view('SetNewPassword')->with('err', $err);
        }

        // Check if the token has expired
        $tokenCreationTime = Carbon::parse($tokenData->created_at);
        $currentTime = Carbon::now();
        if ($currentTime->diffInMinutes($tokenCreationTime) > 10) {
            // Token is expired
            // Optionally, delete the expired token
            DB::table('password_reset_tokens')->where('token', $token)->delete();

            $err = 2;

            return view('SetNewPassword')->with('err', $err);
        }


        // Token is valid and not expired, show the reset form
        return view('SetNewPassword')->with([
            'token' => $token,
            'email' => $tokenData->email,
            'err' => $err,
        ]);
    }

    function StoreUser(Request $request)
    {
        try {
            // Validate the request
            $validatedData = $request->validate([
                'fullName' => 'required|string|max:255',

                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required',
            ]);


            $user = new User();
            $user->fullName = $validatedData['fullName'];

            $user->email = $validatedData['email'];
            $user->password = Hash::make($validatedData['password']);
            $user->save();

            Auth::login($user);

            return redirect()->route('/')->with('success', 'تم انشاء حسابك بنجاح !');
            // Redirect or return response
        } catch (\Exception $e) {
            // Handle other exceptions
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function Logout()
    {
        Auth::logout();
        return redirect('/'); // Redirect to your desired page after logout
    }

    public function Login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->is_admin) {
            }

            return redirect()->back();
        }


        return redirect()->back()->with('loginError', 'البريد الالكتروني او كلمة المرور غير صحيحة ');
    }

    public function SendResetPassword(Request $request)
    {
        $email = $request->email; // The recipient's email address from the request

        // Check if the email exists in the users table
        $user = User::where('email', $email)->first();

        if (!$user) {
            // Email not found, redirect back with error message
            return redirect()->back()->with('error', 'البريد الالكتروني غير موجود');
        }

        // Generate a unique token
        $token = Str::random(60);

        // Store the token in your password_resets table or a similar table
        DB::table('password_reset_tokens')->insert([
            'email' => $email,
            'token' => $token, // Consider encrypting the token
            'created_at' => Carbon::now()
        ]);

        // Generate a reset link
        $link = url('/SetNewPassword/' . $token); // Added a slash before the token


        try {
            // Send the email with the link
            Mail::send('email.password_reset', ['link' => $link], function ($message) use ($email) {
                $message->to($email)->subject('استرجاع كلمة المرور !');
            });

            // Redirect back with success message
            return redirect()->back()->with('success', 'تم ارسال رابط إعادة تعيين كلمة المرور إلى بريدك الإلكتروني.');
        } catch (\Exception $e) {
            // Email sending failed, still redirect back with success message to avoid enumeration attacks
            return redirect()->back()->with('success', 'تم ارسال رابط إعادة تعيين كلمة المرور إلى بريدك الإلكتروني.');
        }
    }

    public function storeNewPassword(Request $request)
    {
        // Validate the request input in a single call
        $validatedData = $request->validate([
            'token' => 'required',
            'password' => 'required|confirmed',
        ], [
            // Custom error message for password confirmation mismatch
            'password.confirmed' => 'كلمتا المرور غير متطابقتين، يرجى التأكد وإعادة المحاولة.',
        ]);

        // Attempt to retrieve the token data
        $tokenData = DB::table('password_reset_tokens')->where('token', $request->token)->first();

        // Check if the token was found
        if (!$tokenData) {
            $err = 1;
            return back()->with('err', $err);
        }

        // Attempt to retrieve the user by their email
        $user = User::where('email', $tokenData->email)->first();

        // Check if a user was found
        if (!$user) {

            $err = 3;

            return back()->with('err', $err);
        }


        // Check if the token has expired (10 minutes)
        $tokenCreationTime = Carbon::parse($tokenData->created_at);
        if (Carbon::now()->diffInMinutes($tokenCreationTime) > 10) {
            $err = 2;

            return back()->with('err', $err);
        }

        // Proceed to update the user's password
        $user->password = Hash::make($request->password);
        $user->save();

        // Delete the token to prevent reuse
        DB::table('password_reset_tokens')->where('token', $request->token)->delete();

        // Log the user in
        Auth::login($user);

        // Redirect the user with a success message
        return redirect('/')->with('success', 'تم إعادة تعيين كلمة المرور  بنجاح .');
    }

}
