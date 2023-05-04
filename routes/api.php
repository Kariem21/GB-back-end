<?php

/* use App\Http\Controllers\AuthController; */
use App\Http\Controllers\Api\Admin\AuthController;
use App\http\Controllers\AuthwController;
use App\Http\Controllers\Api\User\AuthController as UserAuthController;
use App\Http\Controllers\hallsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::group([
    'middleware' => ['api'],
    'prefix' => 'auth',
    'namespace'=>'Api',

], function ($router) {

    Route::group(['namespace'=>'Admin','prefix' => 'admin'],function (){
        Route::post('login', [AuthController::class, 'login'])->name('login-admin');
        Route::post('logout',[ AuthController::class,'logout'])-> middleware(['auth.guard:admin-api']);

            });


/*     Route::group(['namespace'=>'User','prefix' => 'user'],function (){
                Route::post('login',[UserAuthController::class, 'login']) ;
                Route::post('logout',[UserAuthController::class, 'logout'])-> middleware(['auth.guard:admin-api']) ;
            }); */


    Route::group(['prefix' => 'user' ,'middleware' => 'auth.guard:user-api'],function (){
        Route::post('profile',function(){
            return  Auth::user(); // return authenticated user data
        }) ;


            });

    Route::post('/register', [AuthwController::class, 'register']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
    Route::get('userphoto/{user_id}', [AuthwController::class, 'getUserPhoto']);
});






Route::group([
    'middleware' => 'api',
], function ($router) {
    Route::get('/getHall/{id}', [hallsController::class, 'getHallController']);
    Route::get('/getHalls', [hallsController::class, 'getHallsController']);
    Route::post('/addHall', [hallsController::class, 'addHallController']);
    Route::post('/updateAllInfoOfHall/{id}', [hallsController::class, 'updateAllInfoOfHallController']);
    Route::post('/deleteHall/{id}', [hallsController::class, 'destroyHallController']);
    Route::post('/updateAnyInfoInHall/{id}', [hallsController::class, 'updateAnyInfoInHallController']);



});










/*     Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); */
