<?php

use App\Http\Controllers\UsuariController;

Route::get('/usuaris', [UsuariController::class, 'index']);