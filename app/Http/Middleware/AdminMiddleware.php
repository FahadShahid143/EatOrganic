<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
       // var_dump(Auth::guard('api')->user());
        /*$user = Auth::user();
        var_dump($user->name);
        die;*/
        if ($request->user() && $request->user()->role!='admin')
        {
            return redirect('home');
        }

        return $next($request);
    }
}
