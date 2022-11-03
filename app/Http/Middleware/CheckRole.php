<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roles;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,$role)
    {        
        $Roles = new Roles();
        
        // dd($Roles->users());

        // if (! auth()->check() ) {
        //     return redirect()->to( 'login' );
        // }

        // if ($Roles->hasRole($role) != $role) {
            if (!Auth::user()->hasRole($role)) {

            abort(401, 'This action is unauthorized.');

        }
      
        return $next($request);

      
        
}
}
