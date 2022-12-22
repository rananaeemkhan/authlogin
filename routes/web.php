<?php
use App\Http\Controllers\AuthloginController;
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

Route::get('/login', [AuthloginController::class, 'login'])->middleware('alreadyloggedIn');

Route::get('/registration', [AuthloginController::class, 'registration'])->middleware('alreadyloggedIn');

Route::post('/registeruser', [AuthloginController::class, 'registeruser']);

Route::post('/loginuser', [AuthloginController::class, 'loginuser']);

Route::get('/dashboard', [AuthloginController::class, 'dashboard'])->middleware('isLoggedIn');

Route::get('/logout', [AuthloginController::class, 'logout']);
