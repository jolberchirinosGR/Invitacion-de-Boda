<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', ApplicationController::class)->where('view', '(.*)')->middleware('auth');

Route::middleware('auth')->group(function () {
    //Ajsutes basicos de la WebService
    Route::get('/web/users', [UserController::class, 'index']);
    Route::post('/web/users', [UserController::class, 'store']);
    Route::put('/web/users/{user}', [UserController::class, 'update']);
    Route::delete('/web/users/{user}', [UserController::class, 'destory']);
    Route::get('/web/users_unpaged', [UserController::class, 'index_unpaged']);
    Route::get('/web/roles', [UserController::class, 'getRoles']);
    Route::get('/web/profile', [UserController::class, 'profile']);

    //Resources
    Route::resource('web/files', FileController::class);
    Route::post('/web/move_file', [FileController::class, 'move_file']);

    Route::resource('web/folders', FolderController::class);
    Route::get('/web/folders_unpaged', [FolderController::class, 'index_unpaged']);
});

Route::get('/get-logs', function () {
    $logs = file_get_contents(storage_path('logs/laravel.log'));
    return response()->json(['logs' => $logs]);
});

Route::get('/clear-log', function () {
    file_put_contents(storage_path('logs/laravel.log'), '');
    return response()->json(['message' => 'Logs vaciados correctamente']);
});

Route::get('{view}', ApplicationController::class)->where('view', '(.*)')->middleware('auth');
