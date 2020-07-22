<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Support\Facades\Hash;

class AuthSecretKeyMiddleware
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
        $secretKey = $request->has('DUANYAM_API_SECRET_KEY') ? $request->input('DUANYAM_API_SECRET_KEY') : null;
        $secretKeyHash = env('API_SECRET_KEY');

        try {
            if(!$secretKey) {
                throw new Exception('Secret key is empty');
            }

            if(!Hash::check($secretKey, $secretKeyHash)) {
                throw new Exception('Secret key is wrong');
            }
        } catch (Exception $e) {
            return response()->json([
                'Success' => false,
                'Message' => 'Access Denied: '. $e->getMessage()
            ], 401);
        }

        return $next($request);
    }
}
