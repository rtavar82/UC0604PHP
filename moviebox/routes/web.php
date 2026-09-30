<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Página pública
|--------------------------------------------------------------------------
*/

Route::view('/', 'home')->name('home');


/*
|--------------------------------------------------------------------------
| Autenticação
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'show'])->name('login.show');
    Route::post('/login', [AuthController::class, 'login'])->name('login');

    Route::get('/fast-login/{id}', [AuthController::class, 'fastLogin'])
        ->name('login.fast');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
|
| O administrador pode realizar todas as operações.
|
*/

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::name('admin.')->group(function () {

        Route::prefix('admin')->group(function () {

            Route::view('dashboard', 'dashboard')
                ->name('dashboard');

            Route::resource('genres', GenreController::class)
                ->except('show');

            Route::resource('actors', ActorController::class);

            Route::resource('movies', MovieController::class);


            /*
            |------------------------------------------------------------------
            | Soft Deletes - Actors
            |------------------------------------------------------------------
            */

            Route::get('actors-trashed', [ActorController::class, 'trashed'])
                ->name('actors.trashed');

            Route::patch('actors/{id}/restore', [ActorController::class, 'restore'])
                ->name('actors.restore');

            Route::delete('actors/{id}/force-delete', [ActorController::class, 'forceDelete'])
                ->name('actors.force-delete');
        });
    });
});


/*
|--------------------------------------------------------------------------
| EDITOR
|--------------------------------------------------------------------------
|
| O editor pode consultar, criar e editar.
| Não pode eliminar registos.
|
*/

Route::middleware(['auth', 'role:editor'])->group(function () {

    Route::name('editor.')->group(function () {

        Route::prefix('editor')->group(function () {

            Route::view('dashboard', 'dashboard')
                ->name('dashboard');

            Route::resource('genres', GenreController::class)
                ->only('index', 'edit', 'update');

            Route::resource('actors', ActorController::class)
                ->only(
                    'index',
                    'show',
                    'create',
                    'store',
                    'edit',
                    'update'
                );

            Route::resource('movies', MovieController::class)
                ->only(
                    'index',
                    'show',
                    'create',
                    'store',
                    'edit',
                    'update'
                );
        });
    });
});


/*
|--------------------------------------------------------------------------
| USER
|--------------------------------------------------------------------------
|
| O utilizador apenas pode consultar os dados.
|
*/

Route::middleware(['auth', 'role:user'])->group(function () {

    Route::name('user.')->group(function () {

        Route::prefix('user')->group(function () {

            Route::view('dashboard', 'dashboard')
                ->name('dashboard');

            Route::resource('genres', GenreController::class)
                ->only('index');

            Route::resource('actors', ActorController::class)
                ->only('index', 'show');

            Route::resource('movies', MovieController::class)
                ->only('index', 'show');
        });
    });
});
