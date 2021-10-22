<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function index(Request $request)
    {

        $erro = '';

        if ($request->get('erro') == 1) {
            $erro = 'Usuário ou senha não existe';
        }
        if ($request->get('erro') == 2) {
            $erro = 'Necessário realizar login para ter acesso a pagina.';
        }


        return view('site.login', ['titulo' => 'login', 'erro' => $erro]);
    }



    public function autenticar(request $request)
    {
        //Regras de Validação
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        //Mensagens de feedback de validação
        $feedback = [
            'usuario.email' => 'O campo usuário (e-mail) é obrigatorio',
            'senha.required' => 'O campo senha é obrigatorio.'
        ];

        $request->validate($regras, $feedback);
        // Variaveis que recuperam os parametros passados no formulario.
        $email = $request->get('usuario');
        $password = $request->get('senha');

        // Iniciar o model User

        $user = new User();

        $usuario = $user->where('email', $email)
            ->where('password', $password)
            ->get()
            ->first();


        if (isset($usuario->name)) {
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }
    }
    public function sair(Request $request)
    {
        session_destroy();
        return redirect()->route('site.index');
    }
}
