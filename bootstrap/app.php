<?php

use App\Http\Middleware\AuthenticationAdmin;
use App\Http\Middleware\AuthenticationMember;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->appendToGroup('member',[AuthenticationMember::class]);
        $middleware->appendToGroup('admin',[AuthenticationAdmin::class]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
