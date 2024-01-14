<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

//HomeController

route::get('/', [HomeController::class, 'homepage']);
route::get('/home', [HomeController::class, 'index'])->middleware('auth')-> name('home');
route::get('/post_details/{id}', [HomeController::class, 'post_details']);
route::get('/create_post', [HomeController::class, 'create_post'])->middleware('auth');
route::post('/user_post', [HomeController::class, 'user_post'])->middleware('auth');
route::get('/my_post', [HomeController::class, 'my_post'])->middleware('auth');
route::get('/my_post_del/{id}', [HomeController::class, 'my_post_del'])->middleware('auth');
route::get('/post_update_page/{id}', [HomeController::class, 'post_update_page'])->middleware('auth');
route::post('/update_post_data/{id}', [HomeController::class, 'update_post_data'])->middleware('auth');



// route::get('post', [HomeController::class, 'post']) ->middleware(['auth', 'admin']);




//ProfileController
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//AdminController
route::get('/feedback_page', [AdminController::class, 'feedback_page'])->middleware('auth', 'admin');
route::post('/add_post', [AdminController::class, 'add_post'])->middleware('auth', 'admin');
route::get('/show_post', [AdminController::class, 'show_post'])->middleware('auth', 'admin');
route::get('/delete_post/{id}', [AdminController::class, 'delete_post'])->middleware('auth', 'admin');
route::get('/edit_page/{id}', [AdminController::class, 'edit_page'])->middleware('auth', 'admin');
route::post('/update_post/{id}', [AdminController::class, 'update_post'])->middleware('auth', 'admin');
route::get('/accept_post/{id}', [AdminController::class, 'accept_post'])->middleware('auth', 'admin');
route::get('/reject_post/{id}', [AdminController::class, 'reject_post'])->middleware('auth', 'admin');







