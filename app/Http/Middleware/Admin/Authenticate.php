<?php

namespace App\Http\Middleware\Admin;

use Closure;

class Authenticate
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
            if (auth()->check()) {
                if(auth()->user()->role_id == 1){
                    return $next($request);
                }
                flash()->success('Not Allowed!');
                return redirect('/');
            }
            flash()->success('Please Login first!');
            return redirect()->route('admin.login');
    }
}
