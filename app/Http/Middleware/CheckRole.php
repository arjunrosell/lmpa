<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (!$request->user() || !$request->user()->hasRole($role)) {
            abort(403, 'Forbidden access.');
            // if ($request->user()->hasRole('admin')) {
            //     return redirect()->route('admin.index');
            // } elseif ($request->user()->hasRole('staff')) {
            //     return redirect()->route('staff.index');
            // } elseif ($request->user()->hasRole('client')) {
            //     return redirect()->route('client.index');
            // }
        }

        return $next($request);
    }
}
