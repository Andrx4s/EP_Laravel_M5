<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * @param Request $request
     * @param Closure $next
     * @param ...$roles
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        # Получаем роль авторизированного пользователя
        $userRole = Auth::user()->role->en_name;

        # Проверяем роль пользователя, подходит ли она под роли проверки
        if(in_array($userRole, $roles))
            return $next($request);
        else
            return redirect()->route('login');
    }
}
