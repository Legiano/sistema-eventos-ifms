<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;  // Importe a fachada Auth

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Verifique se o usuário está autenticado e é um administrador
        if (Auth::check() && Auth::user()->role === 'admin') {  // Usando a fachada Auth explicitamente
            return $next($request);
        }

        // Caso contrário, redirecione para a página inicial com uma mensagem de erro
        return redirect('/')->with('msg', 'Você não tem permissão para acessar essa página.');
    }
}


