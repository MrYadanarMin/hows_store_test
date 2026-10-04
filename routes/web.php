<?php

use App\Http\Controllers\BorrowController;

Route::get('/', function () {
    return redirect()->route('borrows.index');
});

Route::resource('borrows', BorrowController::class);
