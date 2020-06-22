<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

class IsAppInstalled
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
        if(Schema::hasTable('users') && User::count() !== 0)
        {
            return $next($request);
        }

        return redirect()->route('install')->with('Whooo!!! Install the app');
    }
}
