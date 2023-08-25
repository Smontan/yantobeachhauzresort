<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::user()->role_as == '1') {
            flash()
                ->option('timeout', 3000)
                ->addError('Access denied, as you are not an Admin!');
            return redirect('/');
            // return redirect('/')->with('status', 'Access denied, as you are not an Admin!');
        }
        return $next($request);
    }
}