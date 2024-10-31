<?php

namespace App\Http\Controllers;

use App\Actions\CheckIfEmailExists;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view("auth.login");
    }

    public function login(Request $request)
    {
        $validatedData = $request->validate([
            "email" => "email",
            "password" => "required"
        ]);

        if (Auth::attempt($validatedData)) {
            return redirect()->intended('dashboard');
        }

        return back()->withErrors(['credentials' => 'Credenciais incorretas']);
    }

    public function showRegisterForm()
    {
        return view("auth.register");
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            "first_name" => "required",
            "last_name" => "required",
            "email" => "email|unique:users,email",
            "password" => "required|confirmed|min:8"
        ], [
            "first_name.required" => "O nome é obrigatório",
            "last_name.required" => "O sobrenome é obrigatório",
            "email.unique" => "O e-mail já está cadastrado",
            "email.email" => "E-mail inválido",
            "password.required" => "A senha é obrigatória",
            "password.confirmed" => "A senha e a confirmação devem ser igual",
            "password.min" => "A senha deve conter no mínimo 8 caracteres"
        ]);

        User::create($validatedData);

        Auth::attempt($validatedData);

        return redirect()->intended("dashboard");
    }

    public function checkEmail(Request $request)
    {
        $validatedData = $request->validate([
            "email" => "email"
        ]);

        return CheckIfEmailExists::execute($validatedData['email']);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route("home");
    }
}
