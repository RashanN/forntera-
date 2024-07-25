<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WheelController;
use App\Http\Controllers\MemberController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/import', function () {
    return view('import');
})->name('import.form');

Route::get('/luckywheel', function () {
    return view('luckywheel');
})->name('luckywheel');
Route::get('/button', function () {
    return view('button');
})->name('button');
Route::get('/winner', function () {
    return view('winner');
})->name('winner');


Route::post('/import-members', [MemberController::class, 'import'])->name('members.import');
Route::get('/conform', [MemberController::class, 'showSearchForm'])->name('conform.form');
Route::get('/search-results', [MemberController::class, 'showResults'])->name('members.results');
Route::get('/results', [MemberController::class, 'search'])->name('members.results');
// Route to conform a member
Route::get('/conform/{id}', [MemberController::class, 'conform'])->name('members.conform');
Route::get('/confirmed-members', [MemberController::class, 'showConfirmed'])->name('members.confirmed');
Route::get('/fetch-confirmed-members', [MemberController::class, 'fetchConfirmedMembers'])->name('members.fetchConfirmed');
Route::get('/tablet', function () {
    return view('tablet');
})->name('tablet');

Route::get('/desktop', function () {
    return view('desktop');
})->name('desktop');

// Route::post('/trigger-spin', [WheelController::class, 'triggerSpin']);
// Route::get('/check-spin', [WheelController::class, 'checkSpin']);

// routes/web.php
Route::get('/get-spin-state', 'WheelController@getSpinState')->name('get-spin-state');
Route::post('/trigger-spin', 'WheelController@triggerSpin')->name('trigger-spin');

Route::get('/spin-wheel', [WheelController::class, 'spin'])->name('spin-wheel');

Route::get('/winner', [WheelController::class, 'checkWheel'])->name('check.wheel');
Route::get('/winner', [WheelController::class, 'showWinner'])->name('winner.show');