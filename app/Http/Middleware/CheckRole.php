<?php

namespace App\Http\Middleware;

use Closure;
use RealRashid\SweetAlert\Facades\Alert;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (request()->user()->role == 0) {
            Alert::alert('Accée interdit', 'Vous l\'avez pas l\'accée a cette partie', 'error');
            //return abort(403);
            return back();
        }
        return $next($request);
    }
}