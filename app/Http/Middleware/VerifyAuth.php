<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class VerifyAuth
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
      if(!Auth::check()) {
         session()->flash('message', 'You Must Login First! ');
         return redirect()->back();
      }
      return $next($request);
   }
}
