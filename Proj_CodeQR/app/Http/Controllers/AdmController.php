<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adm;
use App\Http\Requests\UpdateAdmRequest;
use Illuminate\Suport\Facades\Auth;

class AdmController extends Controller
{

    public function index()
    {
        return view('login.login');
    }

    public function create()
    {
       return view ('login.cadastrar');
    }

    public function auth(Request $request)
    {
    // fazendo a autenticação e validação do novo usuário
        $credenciais = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credenciais)) {
            $request->session()->regenerate();
            return redirect()->intended('adm.options');
        } else {
            return redirect()->back()->with('erro', 'Usuário ou senha inválido');
        }
        
    }

    public function store(Request $request)
    {
    // validação e autenticação de um login novo
        $user = $request->all();
        $user['password'] = bcrypt($request->senha);
        $user = Adm::create($user);

        Auth::login($user);

        return redirect('adm.dashboard');
    }

    public function show(Request $request)
    {
        return view('adm.dashboard');
    }

    public function edit(Adm $idoso)
    {
        //
    }

    public function update(UpdateAdmRequest $request, Adm $idoso)
    {
        //
    }

    public function destroy(Adm $idoso)
    {
        //
    }
}
