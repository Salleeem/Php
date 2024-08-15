<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    // Exibe o formulário de registro
    public function showRegistroForm()
    {
        return view('usuarios.registro');
    }

    // Processa o registro do usuário
    public function registro(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuarios',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $usuario = new Usuario();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->save();

        // Autentica o usuário após o registro
        session(['usuario_id' => $usuario->id]);

        return redirect()->route('dashboard');
    }

    // Exibe o formulário de login
    public function showLoginForm()
    {
        return view('usuarios.login');
    }

    // Processa o login do usuário
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $usuario = Usuario::where('email', $request->email)->first();

        if ($usuario && Hash::check($request->password, $usuario->password)) {
            // Autentica o usuário
            session(['usuario_id' => $usuario->id]);
            return redirect()->route('dashboard');
        } else {
            return back()->withErrors([
                'email' => 'As credenciais fornecidas estão incorretas.',
            ]);
        }
    }

    // Processa o logout do usuário
    public function logout()
    {
        session()->forget('usuario_id');
        return redirect()->route('home');
    }

    // Exibe o dashboard do usuário
    public function dashboard()
    {
        if (!session('usuario_id')) {
            return redirect()->route('usuarios.login');
        }

        return view('dashboard');
    }
}
