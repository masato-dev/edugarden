<?php

namespace App\Http\Middleware;

use App\Trait\JsonBehavior;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyUserLoggedIn
{
    use JsonBehavior;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth('user:web')->user();
        if(empty($user)) {
            $path = $request->path();
            if (str_starts_with($path, 'api') || str_starts_with($path, 'ajax')) {
                return $this->error(
                    'Unauthorized', 
                    Response::HTTP_UNAUTHORIZED, 
                    __('Vui lòng đăng nhập để thực hiện tính năng này')
                );
            }
            return redirect()->route('home');
        }
        return $next($request);
    }
}
