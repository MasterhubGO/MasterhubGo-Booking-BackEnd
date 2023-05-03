<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckMessageLength
{
    public function handle(Request $request, Closure $next)
    {
        $input = $request->input('text');
        if (strlen($input) > 5000) {
            return response()->json([
                'status' => 'error',
                'message' => 'Text exceeds 5000 characters limit'
            ], 400);
        }
        return $next($request);
    }
}
