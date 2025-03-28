<?php

use App\Http\Controllers\Account;
use App\Http\Controllers\Auth\Sessions;
use App\Http\Controllers\Files;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::prefix('/auth')->middleware('guest')->group(function(){
    Route::controller(Sessions::class)->group(function(){
        Route::get('/login', 'create')->name('auth.sessions.create');
        Route::post('/login', 'store')->name('auth.sessions.store');

        Route::get('/register', 'registerForm')->name('auth.register.create');
        Route::post('/register', 'register')->name('auth.register.store');
    });
});

Route::middleware('auth')->get('/', [Account::class, 'index'])->name('account.index');

Route::middleware('auth')->delete('/logout', [Sessions::class, 'destroy'])->name('auth.sessions.destroy');

Route::middleware('auth')->group(function(){
    Route::get('/files/{file}/download', [Files::class, 'download'])->name('files.download');
    Route::resource('files', Files::class);
});
