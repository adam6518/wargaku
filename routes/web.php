<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VoterController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get(
    '/login',
    [AuthController::class, 'showLogin']
);

Route::post(
    '/login',
    [AuthController::class, 'login']
);

Route::get(
    '/logout',
    [AuthController::class, 'logout']
);

Route::middleware('check.login')
    ->group(function () {

        Route::get(
            '/dashboard',
            [DashboardController::class, 'index']
        );

        Route::get(
            '/voters',
            [VoterController::class, 'index']
        )->name('voters.index');

        Route::get(
            '/voters/create',
            [VoterController::class, 'create']
        )->name('voters.create');

        Route::post(
            '/voters',
            [VoterController::class, 'store']
        )->name('voters.store');

        Route::get(
            '/voters/search',
            [VoterController::class, 'search']
        );
    });