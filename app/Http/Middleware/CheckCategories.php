<?php

namespace App\Http\Middleware;

use App\Category;
use Closure;

class CheckCategories
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
        $count = Category::all()->count();
        if ($count == 0) {
            session()->flash('error', 'add a category first ...');
            return redirect(route('categories.create'));
        }
        return $next($request);
    }
}
