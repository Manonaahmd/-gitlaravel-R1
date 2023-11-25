<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\NewwsController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', function(){
    return 'Welcome to my first route';
});

Route::get ('user/{name}/{age?}',function($name,$age=0){
    $msg = 'the username is : ' . $name;
    if($age > 0){
        $msg .= ' and the age is: '. $age ;
    }
    return $msg;
})->whereIn('name',['Peter','Tony']);

Route::prefix('product')->group(function(){

    Route::get('/',function(){
        return 'Products home page';
    });

    Route::get('laptop',function(){
        return 'Laptop page';
    });

    Route::get('camera',function(){
        return 'Camera page';
    });

    Route::get('projector',function(){
        return 'Projectors page';
    });
});

// Route::fallback(function(){
//     return redirect('/');
// });

Route::get('cv',function(){
    return view('cv');
});

// Route::get('login',function(){
//     return view('login');
// });

// Route::post('receive',function(){
//     return 'Data received';
// })->name('receive');

Route::get('login',[ExampleController::class, 'login']);

Route::post('receive',[ExampleController::class, 'received'])->name('receive');

Route::get('test1',[ExampleController::class, 'test1']);

Route::post('storeCar',[CarController::class, 'store'])->name('storeCar');

Route::get('addCar',[CarController::class, 'create']);

Route::get('cars', [CarController::class, 'index']);
Route::get('/newws', [NewwsController::class, 'index'])->name('newws.index');
Route::get('/newws/create', [NewwsController::class, 'create'])->name('newws.create');
Route::post('/newws', [NewwsController::class, 'store'])->name('newws.store');
Route::get('/newws/{newws}/edit', [NewwsController::class, 'edit'])->name('newws.edit');
Route::put('/newws/{newws}/update', [NewwsController::class, 'update'])->name('newws.update');
Route::delete('/newws/{newws}/destroy', [NewwsController::class, 'destroy'])->name('newws.destroy');
