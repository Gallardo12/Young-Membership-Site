<?php

namespace App\Http\Middleware;

use Closure;

class isBoth {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {
		$user = $request->user();
		if ($user->role->name == 'Administrador' || $user->role->name == 'Emprendedor') {
			return $next($request);
		}
		return $next($request);
	}
}
