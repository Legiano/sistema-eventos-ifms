<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        // Verifica se o usuário tem a role 'admin'
        if (Auth::user()->role !== 'admin') {
            return redirect('/')->with('msg', 'Você não tem permissão para acessar o painel de administração.');
        }

        return view('admin.dashboard'); // Retorne a view do painel admin
    }
}

