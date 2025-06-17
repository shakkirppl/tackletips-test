<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerRegistration;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginRequest;
class RegisterController extends Controller
{
    //
    public function login(Request $request)
    {
        try {
        return view('front-end.login');
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }
    public function register(Request $request)
    {
        try {

       
        return view('front-end.sign-up');
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }
    public function register_user(Request $request)
    {
        //  return $request->all();
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required_without:phone', 'nullable', 'email', 'max:255', Rule::unique('users', 'email')],
            'phone' => [
                'required_without:email', 
                'nullable', 
                'regex:/^\+?(?:[0-9] ?){6,15}[0-9]$/',  // Accepts international numbers
                Rule::unique('users', 'phone')
            ],
            'password' => ['required', 'confirmed', 'min:6'],
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator) // Pass validation errors to Blade
                ->withInput(); // Retain form input
        }
        try {
            DB::transaction(function () use ($request) {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
        ]);

        event(new Registered($user));
        $customer=new CustomerRegistration;
        $customer->customer_name=$request->name;
        $customer->customer_email=$request->email;
        $customer->customer_mobile=$request->phone;
        $customer->user_id=$user->id;
        $customer->save();
        $user = User::find($user->id);
        $user->customer_id=$customer->id;
        $user->save();
        Auth::login($user);
    });


        return redirect('/');
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }
    public function login_user(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'email' => 'required|string',  // you can add specific validation for email/phone
            'password' => 'required|string',
        ]);
    
        // Get the credentials (email or phone)
        $credentials = $request->only('email', 'password');
    
        // Check if the provided value is an email or phone number
        if (filter_var($credentials['email'], FILTER_VALIDATE_EMAIL)) {
            $loginField = 'email';
        } else {
            $loginField = 'phone';
        }
    
        // Try to authenticate using the email or phone and the provided password
        if (Auth::attempt([$loginField => $credentials['email'], 'password' => $credentials['password']])) {
            // Regenerate session to avoid session fixation attacks
            $request->session()->regenerate();
    
            // Redirect user to the intended page or home page
            return redirect()->intended('/');
        }
    
         // If login fails, redirect back with error message
         return back()->withErrors(['login' => 'Invalid email/phone or password']);
    }
    // public function login_user(LoginRequest $request): RedirectResponse
    // {
    //     try {

    //     $request->authenticate();

    //     $request->session()->regenerate();
    //     return redirect()->intended(RouteServiceProvider::HOME);
    // } catch (\Exception $e) {
    //     return $e->getMessage();
    //   }
    // }
}
