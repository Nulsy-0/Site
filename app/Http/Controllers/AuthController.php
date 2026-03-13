<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class AuthController extends Controller
{
    public function viewRegister()
    {
        return view('2.Auth.register');
    }

    public function register(Request $request)
    {

        $request->validate([
            'name' => 'required | min:5 | max:20 | string',
            'email' => 'required | string | email | max:255 | unique:users',
            'password' => ['required', 'confirmed', 'string', Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
            'password_confirmation' => 'required | string',
        ]);

        //->uncompromised()

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        Auth::login($user);

        return redirect(route('ideas.index'));
    }

    public function logout()
    {

        Auth::logout();

        return redirect(route('ideas.index'));
    }

    public function viewLogin()
    {
        return view('2.Auth.login');
    }

    public function login(Request $request)
    {
        $user = User::where('name', $request->nameOrEmail)
            ->orWhere('email', $request->nameOrEmail)
            ->first();

        if ($user) {

            $vadidated = $request->validate([
                'nameOrEmail' => 'required | min:5 | max:255 | string',
                'password' => ['required', 'string', Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
            ]);

            //->uncompromised()

            $type = filter_var($vadidated['nameOrEmail'], FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

            if (Auth::attempt([$type => $vadidated['nameOrEmail'], 'password' => $vadidated['password']])) {
                $request->session()->regenerate();
                return redirect(route('ideas.index'));   
            }
        }

        return back()->withErrors([
            'password' => 'Não está na base de dados',
        ]);
    }
}
