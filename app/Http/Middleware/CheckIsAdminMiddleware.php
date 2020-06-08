<?php

namespace App\Http\Middleware;

use Closure;

class CheckIsAdminMiddleware
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
        // $user = auth()->user();
        // if($user->email != 'langosh.rudolph@example.org') {
        //     return redirect('/');
        // }

        // if(!in_array($user->email, ['langosh.rudolph@example.org', 'frederick.stehr@example.org'])) {
        //     return redirect('/');
        // }


        return $next($request);
    }
}
