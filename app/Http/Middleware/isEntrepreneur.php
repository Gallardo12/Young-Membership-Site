<?php

namespace App\Http\Middleware;

use Closure;

class isEntrepreneur {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {
		$user = $request->user();
		if ($user->role->name == 'Emprendedor') {
			return $next($request);
		}
		return $next($request);
	}
}
