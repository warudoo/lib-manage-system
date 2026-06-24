<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class AdminMiddleware
{

    /*
    Middleware pengecekan role

    admin:
        boleh akses

    user:
        ditolak
    */


    public function handle(
        Request $request,
        Closure $next
    ): Response
    {


        // cek apakah user login dan role admin
        if (
            auth()->check() &&
            auth()->user()->role == 'admin'
        ) {


            return $next($request);


        }



        // jika bukan admin kembali dashboard
        return redirect('/dashboard')
            ->with(
                'error',
                'Anda tidak punya akses'
            );


    }


}