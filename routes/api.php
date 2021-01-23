<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\UserResource;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('users','App\Http\Controllers\Api\UserController');
//->only(['index','show','store']); // toplu olarak api route tanımı yapılmış oluyor, eğer sadece belirli metodları kullanmak ve görmek istiyorsak only ile bunu yapıyoruz

//Route::get('/users', [App\Http\Controllers\Api\UserController::class, 'index'])->name('users');

/*
//    if (rand(1,10) < 3)
//    abort(500,'Bir hata oluştu'); // elle hata oluşturmak

//    return UserResource::collection(\App\Models\User::paginate(10)); //paginate olunca data kapsayıcısı otomatik geliyor

//    UserResource::withoutWrapping(); // bu şekilde veriler data içinde değil doğrudan gelir

//    return UserResource::collection(\App\Models\User::all()); // new yerine collection kullanarak ve all ile tüm kullanıcılar gelir

//    return new UserResource(\App\Models\User::find(1)); //burada resource ile veriler gelip id'si 1 olanı gösterir

//    return response()->json(\App\Models\User::all());

//    return \App\Models\User::all();

//    return \App\Models\User::factory()->count(10)->make();

//   return [
//       [ 'id' => 1, 'name' => 'Taha', 'email' => 'tahayil1461@gmail.com'],
//       [ 'id' => 2, 'name' => 'Yusuf', 'email' => 'yusufe0061@gmail.com'],
//    ];
    */

