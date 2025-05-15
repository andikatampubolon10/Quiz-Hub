<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
class TrustProxies extends Middleware
{
    protected $proxies = '*'; // Mengizinkan semua proxy

    protected $headers = Request::HEADER_X_FORWARDED_ALL;

    // Menambahkan pengaturan untuk memaksa HTTPS
    public function handle($request, \Closure $next)
    {
        if ($request->isSecure()) {
            // Memaksa aplikasi untuk menggunakan HTTPS
            \URL::forceScheme('https');
        }

        return parent::handle($request, $next);
    }
}
