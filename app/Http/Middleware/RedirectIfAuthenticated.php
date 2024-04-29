<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            return $this->redirectToDiary(Auth::user()->id);
        }

        return $next($request);
    }

    protected function redirectToDiary($userId)
    {
        // Customize this logic to fetch the appropriate diary URL for the user
        $diaryUrl = '/diary/' . $userId;
        return redirect()->to($diaryUrl);
    }
    
}
