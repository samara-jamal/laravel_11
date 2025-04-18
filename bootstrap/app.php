<?php

use App\Http\Middleware\Is_Student;
use App\Http\Middleware\IsStudent;
use App\Http\Middleware\IsTeacher;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
       $middleware->alias([
        'Is_Student'=>Is_Student::class,
        'Is_Teacher'=>IsTeacher::class
       ]);
     
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();