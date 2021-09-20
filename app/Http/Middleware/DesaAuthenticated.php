<?php 

namespace App\Http\Middleware;

// use Auth;
use Illuminate\Support\Facades\Auth;
use Closure;

class DesaAuthenticated 
{
    public function handle($request, Closure $next)
    {
        if( Auth::check() )
        {
            // if user admin take him to his dashboard
            if ( $request->user()->isAdmin() ) {
                 return redirect('/admin/dashboard');
            }

            // allow user to proceed with request
            else if ( $request->user()->isDesa() ) {
                 return $next($request);
            }
        }

        abort(404);  // for other user throw 404 error
    }
}