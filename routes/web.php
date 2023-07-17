<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ProductController;

/*mes tests*/

Route::post('/register', [UtilisateurController::class, 'register'])->name('register');

Route::post('/login', [UtilisateurController::class, 'login'])->name('log');

Route::put('/users/{id}/depot', [UtilisateurController::class, 'depotUser']);

Route::put('/users/{id}/withdraw', [UtilisateurController::class, 'withDrawUser']);

Route::put('/users/{id}/pay', [UtilisateurController::class, 'pay']);


/*********************external pays api****************** */
Route::get('/external-payment/{id}', [TransactionController::class, 'show'])->name('external-payment');
Route::post('/process-external-payment', [TransactionController::class, 'process'])->name('process-external-payment');


/***********************products********************* */
Route::get('/products', [ProductController::class,'index'])->name('products');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');



Route::get('/home', function () {
    return view('dashboard');
})->name('home')->middleware('auth');



/*fin mes test*/


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
    return view('login');
});

Route::get('/login',[PostController::class,'index'])->name('login');
Route::get('/create-account', [PostController::class,'create'])->name('create-account');
Route::get('/dashboard', [PostController::class,'dash'])->name('dashboard');

Route::get('/forgot-password', [PostController::class,'forgot'])->name('forgot-password');
Route::get('/formes', [PostController::class,'forms'])->name('formes');
Route::get('/cards', [PostController::class,'card'])->name('cards');
Route::get('/transaction', [PostController::class,'payview'])->name('payviews');

/*Route::get('/buttons', [PostController::class,'button'])->name('buttons');*/


Route::get('/modals', [PostController::class,'modal'])->name('modals');

Route::get('/tables', [PostController::class,'table'])->name('tables');

 Route::get('/charts', [PostController::class,'chart'])->name('charts');

 //Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');
//  Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
//  //Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
//  Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
//  Route::get('/logout', [CustomAuthController::class, 'signOut'])->name('signout');

 //Route::post('/update-account-amount', [UserController::class, 'updateAccountAmount']);






