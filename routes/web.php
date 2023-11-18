<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ProfileController::class ,"index"])->name("home");


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::controller(ProfileController::class)->group(function(){
    Route::post("/ajouterProfile","ajouterProfile")->name("ajouterProfile");
    Route::delete("/supprimerProfile/{profile}","supprimerProfile")->name("supprimerProfile");
    Route::get("/afficherUserStories/{id}","afficherUserStories")->name("afficherUserStories");
});

Route::controller(\App\Http\Controllers\UserStorieController::class)->group(function(){
    Route::post("/ajouterUserStorie/{profile}","ajouterUserStorie")->name("ajouterUserStorie");
    Route::delete("/supprimerUserStorie/{story}","supprimerUserStorie")->name("supprimerUserStorie");
    Route::put("/modifierUserStorie","modifierUserStorie")->name("modifierUserStorie");
});








require __DIR__.'/auth.php';
