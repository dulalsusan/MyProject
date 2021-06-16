<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        //   return $request;
        

        $request->validate([
            'name' => 'required|string|max:255',
            'user_type' => 'required|string|max:10|min:4',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ],
        [
            'user_type.min' => 'select any user',
        ]);

        // $user = User::create([
        //     'name' => $request->name,
        //     'user_type' => $request->user_type,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);

        $user = new User;
        
        $user->name = $request->input('name');
        $user->user_type =$request->input('user_type');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();


        event(new Registered($user));

        Auth::login($user);

         $request->session()->regenerate();
        if(auth()->user()->user_type == 'admin'){
        return redirect()->intended(RouteServiceProvider::AdminPanel);
        }
        return redirect()->intended(RouteServiceProvider::SellerPanel);
    }
}
