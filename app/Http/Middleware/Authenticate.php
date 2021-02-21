<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Http\Response as IlluminateResponse;

class Authenticate
{
    public function handle(Request $request, Closure $next)
    {
        if($request->header('token')) {
			$token = $request->header('token');
			if($token!="123456789") {
				return $this->unauthorized();
			}
			return $next($request);
		}
		
		return $this->unauthorized();
		
    }
	
	public function unauthorized() {
		return response()->json(['message'=>'Unauthorized'], IlluminateResponse::HTTP_UNAUTHORIZED);
	}
}
