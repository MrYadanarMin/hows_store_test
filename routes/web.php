<?php

//use App\Http\Controllers\BorrowController;
use App\Http\Controllers\ApiTestingController;
// Route::get('/', function () {
//     return redirect()->route('borrows.index');
// });

// Route::resource('borrows', BorrowController::class);

Route::get('/', function () {
    return redirect()->route('apitest.index');
});

Route::resource('apitest', ApiTestingController::class);
