<?php

use App\Http\Controllers\CandidatesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/createCandidateForm', function () {
    return view('createCandidateForm');
});

Route::get('/voting', [CandidatesController::class, 'votingPage'])->name('votingPage');
Route::post('/createCandidate', [CandidatesController::class, 'createCandidate'])->name('createCandidate');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
