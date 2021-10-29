<?php

namespace App\Http\Middleware;

use App\Models\ProductCounter;
use Closure;
use Illuminate\Http\Request;

class ProductVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $ip = $request->ip();
        if (ProductCounter::where('date', today())->where('ip', $ip)->count() < 1) {
            ProductCounter::create([
                'product' => $request->route('id'),
                'date' => today(),
                'ip' => $ip,
            ]);
        }
        return $next($request);
    }
}
