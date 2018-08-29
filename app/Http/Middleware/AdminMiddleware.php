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

//        dd($request->user()->role=='customer');

        if ($request->user() && ($request->user()->role=='customer')){
            //dd("true");
            //return redirect('/shop');
            return $next($request);
        }
        else {
            return redirect('/login');
        }
 /*       if ($request->user() && $request->user()->role!='admin')
        {
            return redirect('/shop');
        }
        else {
            dd("user");
        }*/

        return $next($request);
    }
}
