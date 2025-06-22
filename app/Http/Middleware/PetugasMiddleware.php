<?php
 
namespace App\Http\Middleware;
 
use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
 
class PetugasMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
     public function handle(Request $request, Closure $next): Response
    {
        $role_id = $request->user()->role_id;
        $admin_role = Role::where('name', 'petugas')->first()->id;
        if ($role_id != $admin_role) {
            return abort(403, 'anda tidak bisa akses halaman ini');
        }
        return $next($request);
    }
}