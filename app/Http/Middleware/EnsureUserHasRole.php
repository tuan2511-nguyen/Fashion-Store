<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  $role
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Kiểm tra nếu người dùng không được xác thực
        if (!$request->user()) {
            // Chuyển hướng đến trang đăng nhập admin
            return redirect()->route('auth.admin')->with('error', 'Bạn cần đăng nhập để thực hiện chức năng này');
        }

        // Kiểm tra nếu người dùng không có vai trò yêu cầu
        if (!$request->user()->hasRole($role)) {
            return redirect()->back()->with('error', 'Bạn không có đủ quyền để thực hiện chức năng này');
        }

        return $next($request);
    }
}
