<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class CheckApiToken
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
        /* codice con le varie verifiche */
        $auth_token = $request->header('authorization');
        /* verifico se esiste un token di autorizzazione */
        if (empty($auth_token)) {
            return response()->json([
                'success' => false,
                'error' => 'Api Token Missed'
            ]);
        }
        /* estraggo il token da header escludendo il nome del token */
        $api_token = substr($auth_token, 7);
        $user = User::where('api_token', $api_token)->first();
        if (!$user) {
            return response()->json([
                'success' => false,
                'error' => 'Wrong Api Token'
            ]);
        }
        return $next($request);
    }
}
